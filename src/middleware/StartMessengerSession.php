<?php

namespace Shapoapps\MultibotDriver\middleware;

use Closure;
use Illuminate\Http\Request;
use Shapoapps\MultibotDriver\SessionControllers\MessengerSessionManager;
use Shapoapps\MultibotDriver\SessionControllers\MessengerStore;
use Shapoapps\MultibotDriver\ShapoappsMultibotDriver;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;


class StartMessengerSession
{

    protected $manager;


    public function __construct(MessengerSessionManager $manager)
    {
        $this->manager = $manager;
    }


    public function handle($request, Closure $next)
    {

        if (! $this->sessionConfigured() and config('shapoapps_multibot.session_mode') != true) {
            return $next($request);
        }


	$request_detection_result = $this->DetectMessenger();

        if(is_array($request_detection_result)) {
             $session = $this->startSession($request, $request_detection_result);
             $this->collectGarbage($session);
             $this->saveSession($request);
        }
	
	$response = $next($request);
	$this->saveSession($request);
        return $response;
    }


    protected function startSession(Request $request, $request_detection_result)
    {
        return tap($this->getSession($request, $request_detection_result), function ($session) use ($request) {
            $session->start();
        });
    }


    public function getSession(Request $request, $request_detection_result)
    {
        return tap($this->manager->driver(), function ($session) use ($request, $request_detection_result) {
	        $session->setId($request_detection_result['user_session']);
        });
    }


    protected function collectGarbage(MessengerStore $session)
    {
        $config = $this->manager->getSessionConfig();

        if ($this->configHitsLottery($config)) {
            $session->getHandler()->gc($this->getSessionLifetimeInSeconds());
        }
    }


    protected function configHitsLottery(array $config)
    {
        return random_int(1, $config['lottery'][1]) <= $config['lottery'][0];
    }


    protected function saveSession($request)
    {
        $this->manager->driver()->save();
    }


    protected function getSessionLifetimeInSeconds()
    {
        return ($this->manager->getSessionConfig()['lifetime'] ?? null) * 60;
    }


    protected function sessionConfigured()
    {
        return ! is_null($this->manager->getSessionConfig()['driver'] ?? null);
    }


    private function DetectMessenger()
    {
        $headers_collection = collect(getallheaders());
        $request_obj = SymfonyRequest::createFromGlobals();
        $request_method = $_SERVER['REQUEST_METHOD'];
        $raw_request_body = $request_obj->getContent();


        $check_result = $this->CheckIsViberRequest($headers_collection, $request_method, $raw_request_body);
        if (is_array($check_result)) {
            return $check_result;
        }


        $check_result = $this->CheckIsTelegramRequest($headers_collection, $request_method, $raw_request_body);
        if (is_array($check_result)) {
            return $check_result;
        }


        $check_result = $this->CheckIsTwilioRequest($headers_collection, $request_method, (object)$request_obj->request->all());
        if (is_array($check_result)) {
            return $check_result;
        }
    }




    private function CheckIsViberRequest($headers_collection, $request_method, $request_body) {
        $check_result = $headers_collection->has('X-Viber-Content-Signature');
        if($request_method == 'POST' and $check_result) {
            $request_body = json_decode($request_body);
            if(isset($request_body->sender->id)) {
		        return $this->generateMessengerSessionID('viber', $request_body->sender->id);
            }
        }
    }




    private function CheckIsTelegramRequest($headers_collection, $request_method, $raw_request_body) {
        if($request_method == 'POST' and !is_null($headers_collection->get('Content-Type')) and preg_match('/(application.*json)/i', $headers_collection->get('Content-Type'), $matches) == true) {
            $request_body = json_decode($raw_request_body);
            if(isset($request_body->update_id) and isset($request_body->message->message_id) and isset($request_body->message->from) and isset($request_body->message->from->id) and isset($request_body->message->date)) {
                return $this->generateMessengerSessionID('telegram', $request_body->message->from->id); 
            }
        }
    }




    private function CheckIsTwilioRequest($headers_collection, $request_method, $request_body) {
        $check_result = $headers_collection->has('X-Twilio-Signature');
        if($request_method == 'POST' and $check_result and !is_null($headers_collection->get('Content-Type')) and preg_match('/(application.*x-www-form-urlencoded)/i', $headers_collection->get('Content-Type'), $matches) == true) {
            if(isset($request_body->To) and preg_match('/(whatsapp)/i', $request_body->To, $matches) == true) {
		        return $this->generateMessengerSessionID('twilio_whatsapp', $request_body->To);
            }
        }
    }




    private function generateMessengerSessionID($messenger_type, $sender_id) {
		if($this->CheckIsMultiboteModeON()) {
		    $output = array();
            $output['messenger_type'] = $messenger_type;
            $output['user_session'] = sha1('bot_'.ShapoappsMultibotDriver::$current_bot['internal_bot_id'].'_'.$messenger_type.'_'.$sender_id);
		    MessengerStore::$messenger_userid = $sender_id;
		    return $output;
		} 
		else {
            $output = array();
            $output['messenger_type'] = $messenger_type;
            $output['user_session'] = sha1($messenger_type.'_'.$sender_id);
		    MessengerStore::$messenger_userid = $sender_id;
		    return $output;
		}
    }



    private function CheckIsMultiboteModeON() {
        if(config('shapoapps.shapoapps_multibot.multibot_mode') == true and !empty(ShapoappsMultibotDriver::$current_bot)) {
            return true;
        }
    }




    public function debug_to_file($message)
    {
        $date = date('m/d/Y h:i:s a', time());
        $fp = fopen('/var/log/nginx/telegram_bots/get_your_telegram_id_bot/custom_log.txt', 'a');
        $message_for_insert = "\r\n".$date."\r\n---------------------------------------------------\r\n".$message."\r\n---------------------------------------------------\r\n";
        fwrite($fp, $message_for_insert);
        fclose($fp);
    }

}
