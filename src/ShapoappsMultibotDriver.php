<?php

namespace Shapoapps\MultibotDriver;


class ShapoappsMultibotDriver 

{

    public static $current_bot;

    public static $is_internal_request;




    public static function setWebhooksForAllTelegramBots()
    {
        $bots_list = config('shapoapps.shapoapps_multibot.bots_list');

        foreach ($bots_list as $current_bot) {
            if($current_bot['messenger_type'] == 'telegram' and !empty($current_bot['bot_webhook'])) {
                $method = 'setWebhook';
                $max_connections = '50';

                $cSession = curl_init();
                curl_setopt($cSession, CURLOPT_URL, 'https://api.telegram.org/bot' . $current_bot['bot_api_key'] . '/' . $method . '?url=' . $current_bot['bot_webhook'] . '&max_connections=' . $max_connections);
                curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($cSession, CURLOPT_HEADER, false);

                curl_setopt($cSession, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($cSession, CURLOPT_SSL_VERIFYHOST, 2);

                $result = curl_exec($cSession);

            }
        }

    }









    public static function SetCurrentBotByInternalID($internal_bot_id)
    {
        $bot_settings_array = self::GetBotSettingsByInternalID($internal_bot_id);
        if(!empty($bot_settings_array) and is_array($bot_settings_array)) {
            self::$current_bot = $bot_settings_array;
            self::SetCurrentBot_InSystem($bot_settings_array);
            return true;
        } else {
            return false;
        }
    }


    public static function SetCurrentBotByURIkey($bot_uri_key)
    {
        $bot_settings_array = self::GetBotSettingsByURIkey($bot_uri_key);
        if(!empty($bot_settings_array) and is_array($bot_settings_array)) {
            self::$current_bot = $bot_settings_array;
            self::SetCurrentBot_InSystem($bot_settings_array);
            return true;
        } else {
            return false;
        }
    }



    public static function GetBotSettingsByInternalID($bot_internal_id)
    {
        $full_bots_list = config('shapoapps.shapoapps_multibot.bots_list');
        if(is_array($full_bots_list)) {
            foreach($full_bots_list as $current_bot) {
                if($current_bot['internal_bot_id'] == $bot_internal_id) {
                    return $current_bot;
                }
            }
        }
    }




    public static function GetBotsListForDesiredGroup($group_id)
    {
        $full_bots_list = config('shapoapps.shapoapps_multibot.bots_list');
        if(is_array($full_bots_list)) {
            $function_result = array();
            foreach($full_bots_list as $current_bot) {
                if($current_bot['bot_group'] == $group_id) {
                    $function_result[] = $current_bot;
                }
            }
            if(!empty($function_result)) {
                return $function_result;
            }
        }
    }




    public static function GetBotSettingsByURIkey($uri_key)
    {
        $full_bots_list = config('shapoapps.shapoapps_multibot.bots_list');
        if(is_array($full_bots_list)) {
            foreach($full_bots_list as $current_bot) {
                if($current_bot['uri_key'] == $uri_key) {
                    return $current_bot;
                }
            }
        }
    }




    public static function GetBotSettingsByAPIkey($api_key)
    {
        $full_bots_list = config('shapoapps.shapoapps_multibot.bots_list');
        if(is_array($full_bots_list)) {
            foreach($full_bots_list as $current_bot) {
                if($current_bot['bot_api_key'] == $api_key) {
                    return $current_bot;
                }
            }
        }
    }


    public static function GetGroupSpecificSettingsForCurrentBot()
    {
        if(!empty(self::$current_bot) and is_array(self::$current_bot)) {
            $group_specific_list = config('shapoapps.shapoapps_multibot.groups_specific_bots_settings');
            foreach ($group_specific_list as $current_group) {
                if($current_group['bot_group'] == self::$current_bot['bot_group']) {
                    return $current_group;
                }
            }
        }
    }




    public static function CheckIsBotmanTelegramDriverInstalled()
    {
        if(class_exists('\BotMan\Drivers\Telegram\TelegramDriver')) {
            return true;
        }
        else {
            return false;
        }
    }



    public static function CheckIsIrazasyedTelegramDriverInstalled()
    {
        if(class_exists('\Telegram\Bot\Api')) {
            return true;
        }
        else {
            return false;
        }
    }



    public static function CheckIsShapoappsViberDriverInstalled()
    {
        if(class_exists('\Shapoapps\Viber\BotmanViberDriver')) {
            return true;
        }
        else {
            return false;
        }
    }



    public static function CheckIsTwilioBotmanDriverInstalled()
    {
        if(class_exists('\Botman\Drivers\Twilio\TwilioDriver')) {
            return true;
        }
        else {
            return false;
        }
    }



    public static function CheckIsMultibotModeEnabled()
    {
        if(config('shapoapps.shapoapps_multibot.multibot_mode')) {
            return true;
        } else {
            return false;
        }
    }



    public static function CheckIsMessengerSessionManagerEnabled()
    {
        if(config('shapoapps.shapoapps_multibot.session_mode')) {
            return true;
        } else {
            return false;
        }
    }





    public static function multibot_handler($request)
    {
        if(self::CheckIsMultibotModeEnabled()) {
            if(!self::check_is_internal_request()) {
                self::$is_internal_request = false;
                if (!is_null($uri_key = self::get_uri_key_from_request_uri())) {
                    $current_bot_settings = self::GetBotSettingsByURIkey($uri_key);
                    self::$current_bot = $current_bot_settings;
                    self::SetCurrentBot_InSystem($current_bot_settings);
                }
            } else {
                self::$is_internal_request = true;
            }
        }
    }




    private static function SetCurrentBot_InSystem($current_bot_settings)
    {
        if ($current_bot_settings['messenger_type'] == 'telegram') {
            if (self::CheckIsBotmanTelegramDriverInstalled()) {
                config(['botman.telegram.token' => $current_bot_settings['bot_api_key']]);
            }
            if (self::CheckIsIrazasyedTelegramDriverInstalled()) {
                config(['telegram.bot_token' => $current_bot_settings['bot_api_key']]);
            }
        } elseif ($current_bot_settings['messenger_type'] == 'viber') {
            if (self::CheckIsShapoappsViberDriverInstalled()) {
                config(['shapoapps.shapoapps_viber.token' => $current_bot_settings['bot_api_key']]);
            }
        } elseif ($current_bot_settings['messenger_type'] == 'twilio_whatsapp') {
            if (self::CheckIsTwilioBotmanDriverInstalled()) {
                config(['botman.twilio.sid' => $current_bot_settings['twilio_sid']]);
                config(['botman.twilio.fromNumber' => $current_bot_settings['twilio_from_number']]);
                config(['botman.twilio.token' => $current_bot_settings['bot_api_key']]);
            }
        }
    }






    public static function get_uri_key_from_request_uri()
    {
        $uri = \Request::getRequestUri();
        if (preg_match('/(?<=\/)([a-zA-Z0-9]){40,40}(?=\/)/i', $uri, $uri_key) == 1) {
            return $uri_key[0];
        } else {
            return null;
        }
    }



    public static function check_is_internal_request()
    {
        $full_url = \Request::fullUrl();
        if(preg_match('/(localhost)/i', $full_url, $matches) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

