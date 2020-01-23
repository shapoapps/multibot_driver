![alt text](https://github.com/shapoapps/assets/blob/master/very_small_banner1.jpg)
# multibot_driver v1.0 for Laravel:  

### Multibot for telegram, twilio whatsapp
### Session manager for telegram, twilio whatsapp

[Russian documentation](https://github.com/shapoapps/multibot_driver/blob/master/README_RU.md)

  When developing chat bots. There is often a need to store the data entered by the user on the server and use it for 
  the following user requests. For example, when navigating a user through a catalog of goods, navigating through a menu 
  with a deep hierarchy, checkout a new purchase. To find out what data you entered in the previous step, which menu you 
  selected, which order parameters you entered earlier. For all these tasks and not just - use <b>multibot_driver</b>.

<b>multibot driver</b> allows you to store user status.
The mechanism of operation of multibot driver is similar to the mechanism of sessions for users of web browsers. When 
working with the standard module Laravel Sessions we cannot use sessions for users of messengers telegram, whatsapp. 
Because when our server receives a new message from a user. You can only see one visitor. This visitor is always a 
messenger server. To solve this problem and was created <b>multibot driver</b>

In multibot driver there is a function - <b>multibot</b>. What does it mean? This means that you will now be able to 
optimize your expenses by placing many chat bots on just one server, on one instance of Laravel. You can set up 
interaction between several different chat bots - within the same Laravel instance. For example, make the same 
functionality for telegram bot and twilio whatsapp bot. You can create bots satellites of your main bots, with 
friendly SEO names. Which will have the same functionality with the main bot. Thereby increasing audience coverage. 
Or other options.<br>
For example, the following telegraph bots have the same functionality and are hosted on one server, one instance of Laravel:
[get_your_telegram_id_bot](https://t.me/get_your_telegram_id_bot) ; 
[see_your_telegram_id_bot](https://t.me/see_your_telegram_id_bot) ; 
[know_your_telegram_id_bot](https://t.me/know_your_telegram_id_bot) ; 
[check_telegram_id_bot](https://t.me/check_telegram_id_bot) ; 
[see_telegram_id_bot](https://t.me/see_telegram_id_bot) ; 
[know_telegram_id_bot](https://t.me/know_telegram_id_bot)


<b>multibot_driver is designed for chat bots using Webhook method of receiving information.</b>

### Compatibility:<br>
Botman Telegram driver<br>
Irazasyed Telegram driver<br>
Twilio

### The following configurations have been tested:<br>
Botman Studio + Laravel (5.7 / 5.8) + multibot_driver<br>
Botman + Laravel 6.5.2 + multibot_driver<br>
Irazasyed + Laravel (5.7 / 5.8) + multibot_driver<br>
Irazasyed + Laravel 6.5.2 + multibot_driver<br>

Differences between Botman and Botman Studio:<br>
Botman Studio - Package installed with Laravel instance<br>
Botman - package installed on top of an existing Laravel instance<br>

<br>
<br>

# Contents
#### 1. [Installation](https://github.com/shapoapps/multibot_driver#installation)
#### 2. [What is a <b>URI key</b>](https://github.com/shapoapps/multibot_driver#what-is-a-uri-key-and-what-is-it-for)
#### 3. [Examples of use](https://github.com/shapoapps/multibot_driver#examples-of-use)
#### 4. [Properties and methods](https://github.com/shapoapps/multibot_driver#properties-and-methods)
#### 5. [Features](https://github.com/shapoapps/multibot_driver#features)


<br>
<br>

# Installation

<br>
<b>1.</b> Install Laravel (if not installed)
<br>
<br>

<b>2.</b> Install <b>multibot_driver</b>
<br>

<b>2.1</b> composer require shapoapps/multibot_driver
<br>
  
<b>2.2</b> Install the configuration file of <b>multibot_driver</b>
<br>
  
<b>2.2.1</b> Automatically - enter in the root Laravel catalog command - 
		` php artisan vendor:publish --provider="Shapoapps\MultibotDriver\Providers\ShapoappsMultibotServiceProvider" `
<br> 
    
<b>2.2.2</b> Or manually, copy the shapoapps folder from the catalog of Laravel installed `../vendor/shapoapps/multibot_driver/stubs/config` -> 
    in the catalog of Laravel configurations config. As a result `config/shapoapps/shapoapps_multibot.php`
    has to turn out and create catalog `/storage/framework/messenger_sessions`
<br>
    
<b>3.</b> In the Laravel route file - configure routes for Webhooks of your messengers.

```php
    
    /*Web hook for bot 1*/
    Route::match(['post'], '/FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1/tg.php', 'BotManController@handle');

    /*Web hook for bot 2*/
    Route::match(['post'], '/DBC05DX7BFD92B57ZA6E033AE976F4G73A1DDF34/tg.php', 'BotManController@handle');

    /*Web hook for bot 3*/
    Route::match(['post'], '/M14A52AB0407EG27625EB605142FC2AU5913ED66/tg.php', 'BotManController@handle');

    /*Web hook for bot 4*/
    Route::match(['post'], '/K50G96S13A0YE209E4EE5T808A61ET7464F232T9/tg.php', 'BotManController@handle');

    /*Web hook for bot 5*/
    Route::match(['post'], '/V64E4349S66B5Q4F252F9GB04FA53D0NA86T6F96/tg.php', 'BotManController@handle');

    /*Web hook for bot 6*/
    Route::match(['post'], '/P36F12F2FWAEBD71D5C35J16D9E4C5CAVFF5R9HE/tg.php', 'BotManController@handle');
    
```
<br>

<b>4.</b> In the configuration file of your web server - configure incoming connections (links), for webhooks of your 
messengers. Example for nginx:
<br>


```
...
#Web hook for bot 1
	location =/FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1/tg.php {
		auth_basic off;
		allow all;
		try_files $uri /index.php?query_string = @backend;
	}


	#Web hook for bot 2
	location =/DBC05DX7BFD92B57ZA6E033AE976F4G73A1DDF34/tg.php {
		auth_basic off;
		allow all;
		try_files $uri /index.php?query_string = @backend;
	}


	#Web hook for bot 3
	location =/M14A52AB0407EG27625EB605142FC2AU5913ED66/tg.php {
		auth_basic off;
		allow all;
		try_files $uri /index.php?query_string = @backend;
	}


	#Web hook for bot 4
	location =/K50G96S13A0YE209E4EE5T808A61ET7464F232T9/tg.php {
		auth_basic off;
		allow all;
		try_files $uri /index.php?query_string = @backend;
	}


	#Web hook for bot 5
	location =/V64E4349S66B5Q4F252F9GB04FA53D0NA86T6F96/tg.php {
		auth_basic off;
		allow all;
		try_files $uri /index.php?query_string = @backend;
	}


	#Web hook for bot 6
	location =/P36F12F2FWAEBD71D5C35J16D9E4C5CAVFF5R9HE/tg.php {
		auth_basic off;
		allow all;
		try_files $uri /index.php?query_string = @backend;
	}
  
  
  location @backend {
    auth_basic off;
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
    fastcgi_pass unix:/run/php/php7.3-fpm.sock;
    fastcgi_index index.php?$query_string;
    fastcgi_param SCRIPT_FILENAME $document_root/index.php;
    include fastcgi_params;
	}
  
...
```
<br>
<b>5.</b> In the shapoapps_multibot.php configuration file, populate the bots_list array for all your accounts 
(how to populate in the configuration file).
<br>
<br>


```php
'bots_list' => [
        [
	    'internal_bot_id' => env('TELEGRAM_BOT_NO1_INTERNAL_ID', 'error'), 
	    'bot_group' => env('TELEGRAM_BOT_NO1_BOT_GROUP', 'error'),
	    'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
	    'bot_api_key' => env('TELEGRAM_BOT_NO1_BOT_API_KEY', 'error'),
	    'bot_name' => env('TELEGRAM_BOT_NO1_BOT_NAME', 'error'),
	    'uri_key' => env('TELEGRAM_BOT_NO1_URI_KEY', 'error'),
            'bot_webhook' => env ('TELEGRAM_BOT_NO1_WEBHOOK', 'error'),
        ],

        [
	    'internal_bot_id' => env('TELEGRAM_BOT_NO2_INTERNAL_ID', 'error'), 
	    'bot_group' => env('TELEGRAM_BOT_NO2_BOT_GROUP', 'error'),
	    'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
	    'bot_api_key' => env('TELEGRAM_BOT_NO2_BOT_API_KEY', 'error'),
	    'bot_name' => env('TELEGRAM_BOT_NO2_BOT_NAME', 'error'),
	    'uri_key' => env('TELEGRAM_BOT_NO2_URI_KEY', 'error'),
            'bot_webhook' => env ('TELEGRAM_BOT_NO2_WEBHOOK', 'error'),
        ],

        [
         'internal_bot_id' => env('TELEGRAM_BOT_NO3_INTERNAL_ID', 'error'),
         'bot_group' => env('TELEGRAM_BOT_NO3_BOT_GROUP', 'error'),
         'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
         'bot_api_key' => env('TELEGRAM_BOT_NO3_BOT_API_KEY', 'error'),
         'bot_name' => env('TELEGRAM_BOT_NO3_BOT_NAME', 'error'),
         'uri_key' => env('TELEGRAM_BOT_NO3_URI_KEY', 'error'),
         'bot_webhook' => env ('TELEGRAM_BOT_NO3_WEBHOOK', 'error'),
        ],

        [
          'internal_bot_id' => env('TELEGRAM_BOT_NO4_INTERNAL_ID', 'error'),
          'bot_group' => env('TELEGRAM_BOT_NO4_BOT_GROUP', 'error'),
          'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
          'bot_api_key' => env('TELEGRAM_BOT_NO4_BOT_API_KEY', 'error'),
          'bot_name' => env('TELEGRAM_BOT_NO4_BOT_NAME', 'error'),
          'uri_key' => env('TELEGRAM_BOT_NO4_URI_KEY', 'error'),
          'bot_webhook' => env ('TELEGRAM_BOT_NO4_WEBHOOK', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO5_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO5_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO5_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO5_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO5_URI_KEY', 'error'),
            'bot_webhook' => env ('TELEGRAM_BOT_NO5_WEBHOOK', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO6_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO6_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO6_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO6_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO6_URI_KEY', 'error'),
            'bot_webhook' => env ('TELEGRAM_BOT_NO6_WEBHOOK', 'error'),
        ],

    ],

```
If you want to divide bots into groups with specific settings for each group, fill in an array 
groups_specific_bots_settings, you can add any settings you want for each group of bots yourself. 

```php

    'groups_specific_bots_settings' => [
        [
            'bot_group' => env('BOT_GROUP_NO1', 'error'),
            'database_connection' => 'mysql_1',
            'default_visitor_state' => '1',
            'db_repository_path' => 'App\Repositorys\group1\RepositoryContract',
        ],
        [
            'bot_group' => env('BOT_GROUP_NO2', 'error'),
            'database_connection' => 'mysql_2',
            'default_visitor_state' => '2',
            'db_repository_path' => 'App\Repositorys\group2\RepositoryContract',
        ],
    ],
    
```




<br>
<b>6.</b> In the .env file - fill in all the bots accounts you want to use. Similar to the example:
<br>
<br>


```
...

#Multibot driver settings

#Constants 
MESSENGER_TYPE_TELEGRAM=telegram
MESSENGER_TYPE_VIBER=viber
MESSENGER_TYPE_TWILIO_WHATSAPP=twilio_whatsapp
MESSENGER_SESSION_LIFETIME=1440 # 1 day
MESSENGER_SESSION_DRIVER=file
MESSENGER_SESSION_CONNECTION=mysql_1
MESSENGER_MULTIBOT_MODE=true


#bot groups and groups settings
BOT_GROUP_NO1=1
BOT_GROUP_NO2=2


#bot accounts
TELEGRAM_BOT_NO1_INTERNAL_ID=1   #Internal bot id, must be unique
TELEGRAM_BOT_NO1_BOT_GROUP=${BOT_GROUP_NO1}   #Group to which the bot belongs
TELEGRAM_BOT_NO1_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp47  #API key telegram bot
TELEGRAM_BOT_NO1_BOT_NAME=telegram_sample_one_bot    #Telegram bot name 
TELEGRAM_BOT_NO1_URI_KEY=FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1    # Telegram bot URI key
TELEGRAM_BOT_NO1_WEBHOOK=https://mysite1.com/${TELEGRAM_BOT_NO1_URI_KEY}/tg.php

TELEGRAM_BOT_NO2_INTERNAL_ID=2
TELEGRAM_BOT_NO2_BOT_GROUP=${BOT_GROUP_NO1}
TELEGRAM_BOT_NO2_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp48
TELEGRAM_BOT_NO2_BOT_NAME=telegram_sample_two_bot
TELEGRAM_BOT_NO2_URI_KEY=DBC05DX7BFD92B57ZA6E033AE976F4G73A1DDF34
TELEGRAM_BOT_NO2_WEBHOOK=https://mysite1.com/${TELEGRAM_BOT_NO2_URI_KEY}/tg.php

TELEGRAM_BOT_NO3_INTERNAL_ID=3
TELEGRAM_BOT_NO3_BOT_GROUP=${BOT_GROUP_NO1}
TELEGRAM_BOT_NO3_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp49
TELEGRAM_BOT_NO3_BOT_NAME=telegram_sample_three_bot
TELEGRAM_BOT_NO3_URI_KEY=M14A52AB0407EG27625EB605142FC2AU5913ED66
TELEGRAM_BOT_NO3_WEBHOOK=https://mysite1.com/${TELEGRAM_BOT_NO3_URI_KEY}/tg.php

TELEGRAM_BOT_NO4_INTERNAL_ID=4
TELEGRAM_BOT_NO4_BOT_GROUP=${BOT_GROUP_NO1}
TELEGRAM_BOT_NO4_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp50
TELEGRAM_BOT_NO4_BOT_NAME=telegram_sample_four_bot
TELEGRAM_BOT_NO4_URI_KEY=K50G96S13A0YE209E4EE5T808A61ET7464F232T9
TELEGRAM_BOT_NO4_WEBHOOK=https://mysite1.com/${TELEGRAM_BOT_NO4_URI_KEY}/tg.php

TELEGRAM_BOT_NO5_INTERNAL_ID=5
TELEGRAM_BOT_NO5_BOT_GROUP=${BOT_GROUP_NO1}
TELEGRAM_BOT_NO5_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp51
TELEGRAM_BOT_NO5_BOT_NAME=telegram_sample_five_bot
TELEGRAM_BOT_NO5_URI_KEY=V64E4349S66B5Q4F252F9GB04FA53D0NA86T6F96
TELEGRAM_BOT_NO5_WEBHOOK=https://mysite1.com/${TELEGRAM_BOT_NO5_URI_KEY}/tg.php

TELEGRAM_BOT_NO6_INTERNAL_ID=6
TELEGRAM_BOT_NO6_BOT_GROUP=${BOT_GROUP_NO1}
TELEGRAM_BOT_NO6_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp52
TELEGRAM_BOT_NO6_BOT_NAME=telegram_sample_six_bot
TELEGRAM_BOT_NO6_URI_KEY=P36F12F2FWAEBD71D5C35J16D9E4C5CAVFF5R9HE
TELEGRAM_BOT_NO6_WEBHOOK=https://mysite1.com/${TELEGRAM_BOT_NO6_URI_KEY}/tg.php



#for memcached storage driver
MEMCACHED_HOST=127.0.0.1
MEMCACHED_PERSISTENT_ID=shapoapps_multibot
MEMCACHED_PORT=11211


#for redis storage driver
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
REDIS_DB=0
REDIS_CACHE_DB=1



BROADCAST_DRIVER=log
CACHE_DRIVER=file
#CACHE_DRIVER=memcached
#CACHE_DRIVER=array
#CACHE_DRIVER=redis
#CACHE_DRIVER=database
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

...
```




<br>
<br>

## What is a URI key and what is it for?


URI key is a unique identifier that you have to generate yourself for each bot, the format of the identifier 40 
characters English numbers and letters, for example <b>5F39AF036C4A109A31DCC343C367593176C37CE0</b>. Each bot must 
have its own unique URI key. For each URI bot, the key must be part of a Webhook link, and must be specified in the 
shapoapps_multibot.php configuration file in the array bots_list for example:


`/routes/web.php`
```php
...
/*Web hook for bot 1*/
    Route::match(['post'], '/FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1/tg.php', 'BotManController@handle');
...
```

`/config/shapoapps/shapoapps_multibot.php`

```php
...
'bots_list' => [
        [
	    'internal_bot_id' => env('TELEGRAM_BOT_NO1_INTERNAL_ID', 'error'), 
	    'bot_group' => env('TELEGRAM_BOT_NO1_BOT_GROUP', 'error'),
	    'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
	    'bot_api_key' => env('TELEGRAM_BOT_NO1_BOT_API_KEY', 'error'),
	    'bot_name' => env('TELEGRAM_BOT_NO1_BOT_NAME', 'error'),
	    'uri_key' => env('TELEGRAM_BOT_NO1_URI_KEY', 'error'),
            'bot_webhook' => env ('TELEGRAM_BOT_NO1_WEBHOOK', 'error'),
        ],
        ...
]
...
```

`/.env`
```
...
#bot accounts
TELEGRAM_BOT_NO1_INTERNAL_ID=1
TELEGRAM_BOT_NO1_BOT_GROUP=${BOT_GROUP_NO1}
TELEGRAM_BOT_NO1_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp47
TELEGRAM_BOT_NO1_BOT_NAME=telegram_sample_one_bot
TELEGRAM_BOT_NO1_URI_KEY=FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1
TELEGRAM_BOT_NO1_WEBHOOK=https://mysite1.com/${TELEGRAM_BOT_NO1_URI_KEY}/tg.php
...
```

As a URI key you can use sha1 hash, by search request `sha1 online hash generator` - you easily get what you need.


<br>
<br>

# Examples of use

<br>

<b>1</b> Irazasyed + multibot_driver - external request<br>



```php
namespace App\Http\Controllers;


use Telegram;
use Telegram\Bot\Api;
use Shapoapps\MultibotDriver\ShapoappsMultibotDriver;





class IrazaController extends Controller
{


    public function handle() {

	$subscriber_telegram_id = Telegram::getWebhookUpdates()->getMessage()->getFrom()->getid();
	$received_message = Telegram::getWebhookUpdates()->getMessage()->getText();

	$session_store = resolve('session_driver_interface');
	$session_store->push('current_user_input', $received_message);
	$read_from_session = $session_store->get('current_user_input');

	$response = Telegram::sendMessage([
	    'chat_id' => $subscriber_telegram_id, 
	    'text' => ' serialize($read_from_session)='.serialize($read_from_session)
	]);
    }

}
```



<br>

<b>2</b> Botman Studio + multibot_driver - external request<br>

```php
namespace App\Http\Controllers;

...
use Shapoapps\MultibotDriver\ShapoappsMultibotDriver;
...


class BotManController extends Controller
{

    public function handle() {

	/*Multibot config*/
	$config = [
	    "telegram" => [
    	    "token" => ShapoappsMultibotDriver::$current_bot['bot_api_key']
    	    ]
	];


	/*Single bot mode config*/
	/*$config = [
	    "telegram" => [
    	    "token" => '123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp47'
    	    ]
	];*/
  
	$botman = resolve('botman');
	$user = $botman->getUser();
	$id_of_user = $user->getId();
	$user_message = $botman->getMessage()->getText();
	$session_store = resolve('session_driver_interface');
	$session_store->push('current_user_input', $user_message);
	$read_from_session = $session_store->get('current_user_input');
	$server_response = $botman->say(' serialize($read_from_session)='.serialize($read_from_session), $id_of_user, TelegramDriver::class);

	return 'ok';

    }

}
```




<br>

<b>3</b> Botman Studio + multibot_driver - internal request (Laravel job)<br>

Example of sending a message from a Job:<br>


```php
...
use Shapoapps\MultibotDriver\ShapoappsMultibotDriver;
...

class SendMessageToVisitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



	public function __construct($data)
    	{

        	$this->botman = resolve('botman');

    	}



	public function handle()
    	{
        	ShapoappsMultibotDriver::SetCurrentBotByInternalID('1');
		...
		$recepient_telegram_id = '123456789';
		$server_response = $this->botman->say($message_text, $recepient_telegram_id, TelegramDriver::class, $extra_parameters);
		...
	}	
	
}

```


<br>

<b>4</b> Botman external request<br> 


```php
namespace App\Http\Controllers;


use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use Shapoapps\MultibotDriver\ShapoappsMultibotDriver;


class BotManController extends Controller
{

    public function handle() {

	/*Multibot config*/
	$config = [
	    "telegram" => [
    	    "token" => ShapoappsMultibotDriver::$current_bot['bot_api_key']
    	    ]
	];


	/*Single bot mode config*/
	/*$config = [
	    "telegram" => [
    	    "token" => '123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp47'
    	    ]
	];*/

	DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
	$botman = BotManFactory::create($config);

	$user = $botman->getDriver()->getUser($botman->getDriver()->getMessages()[0]);
	$id_of_user = $user->getId();
	$user_message = $botman->getDriver()->getMessages()[0]->getText();


	$session_store = resolve('session_driver_interface');
	$session_store->push('current_user_input', $user_message);
	$read_from_session = $session_store->get('current_user_input');
	$message_send_server_response = $botman->say(' serialize($read_from_session)='.serialize($read_from_session), $id_of_user, TelegramDriver::class);

	return 'ok';

    }

}
```



<br>
<br>


# Properties and methods

<br>

### Multibot properties and methods.
<br>

<b>ShapoappsMultibotDriver::setWebhooksForAllTelegramBots()</b> - Method for mass setup of webhooks on telegram server for all your telegram bots. Please note that for successful execution, must be filled - in the `.env` file, TELEGRAM_BOT_NO1_WEBHOOK, for each bot. And in the configuration file `shapoapps.shapoapps_multibot`, each telegram bot must have a row - ` 'bot_webhook' => env ('TELEGRAM_BOT_NO1_WEBHOOK', 'error'), ` .<br>
<br>


<b>ShapoappsMultibotDriver::$current_bot</b> - Property that contains the array with the current bot parameters. 
Array format:
<br>
a:6:{s:15:"internal_bot_id";s:1:"1";s:9:"bot_group";s:1:"1";s:14:"messenger_type";s:8:"telegram";
s:11:"bot_api_key";s:45:"123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp47";s:8:"bot_name";s:24:"telegram_sample_one_bot";
s:7:"uri_key";s:40:"FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1";}
<br>

<b>ShapoappsMultibotDriver::$is_internal_request</b> - Property, when executing an internal request (for example, when 
executing a Job) = true, for external request (if the request came from a messenger server) = false.
<br>

<b>ShapoappsMultibotDriver::SetCurrentBotByInternalID($internal_bot_id)</b> - Method for manual setting of the current bot by internal identifier.
<br>

<b>ShapoappsMultibotDriver::SetCurrentBotByURIkey($bot_uri_key)</b> - Method for manual setting of the current bot by URI key.
<br>

<b>ShapoappsMultibotDriver::GetBotSettingsByInternalID($bot_internal_id)</b> - Method returns an array with bot parameters 
for the specified internal identifier.
<br>

<b>ShapoappsMultibotDriver::GetBotsListForDesiredGroup($group_id)</b> - Method returns an array of bot parameter arrays 
for the specified group.
<br>

<b>ShapoappsMultibotDriver::GetBotSettingsByURIkey($uri_key)</b> - Method returns an array with bot parameters for the 
specified URI key.
<br>

<b>ShapoappsMultibotDriver::GetBotSettingsByAPIkey($api_key)</b> - Method returns an array with bot parameters for the specified key API.
<br>

<b>ShapoappsMultibotDriver::GetGroupSpecificSettingsForCurrentBot()</b> - Method returns an array with parameters for the 
current bot group.
<br>

<b>ShapoappsMultibotDriver::CheckIsBotmanTelegramDriverInstalled()</b> - Method, if Botman telegram driver is installed on 
the system - returns true otherwise false.
<br>

<b>ShapoappsMultibotDriver::CheckIsIrazasyedTelegramDriverInstalled()</b> - Method, if Irazasyed Telegram driver is 
installed on the system - returns true otherwise false.
<br>

<b>ShapoappsMultibotDriver::CheckIsTwilioBotmanDriverInstalled()</b> - Method, if Botman Twilio driver is installed on 
the system - returns true otherwise false.
<br>

<b>ShapoappsMultibotDriver::CheckIsMultibotModeEnabled()</b> - Method if Multibot mode is enabled - returns true otherwise false.
<br>

<b>ShapoappsMultibotDriver::CheckIsMessengerSessionManagerEnabled()</b> - Method, if session manager is enabled - returns true otherwise false.
<br>

<b>ShapoappsMultibotDriver::get_uri_key_from_request_uri()</b> - Method, if the incoming request contains a URI key, returns a URI key, otherwise null.
<br>

<b>ShapoappsMultibotDriver::check_is_internal_request()</b> - Method, if the incoming request came from, for example, 
Laravel Job - returns true otherwise false.
<br>

<br>


### Methods of the sessions manager

To access an object - use `$session_driver = resolve('session_driver_interface');` <br>





<b>save()</b> - Saves the session data to the storage.
<br>

<b>ageFlashData()</b> - age flash data.
<br>

<b>all()</b> - Returns an array with all session data of the current user.
<br>

<b>only(array $keys)</b> - Get a subset of session data.
<br>

<b>exists($key)</b> - Checks whether the specified key exists in the session.
<br>

<b>has($key)</b> - Checks whether the key exist and not null
<br>

<b>get($key, $default = null)</b> - Returns an item from a session
<br>

<b>pull($key, $default = null)</b> - Returns a value for the specified key and deletes it.
<br>

<b>hasOldInput($key = null)</b> - Determines whether the session contains old input.
<br>

<b>getOldInput($key = null, $default = null)</b> - Returns the value for the requested key from the flash array
<br>

<b>replace(array $attributes)</b> - Replaces the specified session attributes.
<br>

<b>put($key, $value = null)</b> - Adds a key/value pair or an array of key/value pairs to the session.
<br>

<b>remember($key, Closure $callback)</b> - Returns an item from a session or retains the default value.
<br>

<b>push($key, $value)</b> - Adds a value to the session array.
<br>

<b>increment($key, $amount = 1)</b> - Increases the value of an item saved in session
<br>

<b>decrement($key, $amount = 1)</b> - Reduces the value of an item saved in session
<br>

<b>flash(string $key, $value = true)</b> - Adds a key/value pair to the flash array _flash.new
<br>

<b>now($key, $value)</b> - Adds a value key pair to the flash array _flash.old
<br>

<b>reflash()</b> - Transfers all data from the _flash.old array to the array _flash.new
<br>

<b>keep($keys = null)</b> - Migrates a specified set of keys
<br>

<b>flashInput(array $value)</b> - Adds a specified array of values to the array - _old_input
<br>

<b>remove($key)</b> - Returns an item from a session and deletes it.
<br>

<b>forget($keys)</b> - Removes one or more items from the session.
<br>

<b>flush()</b> - Removes all items from the session.
<br>

<b>invalidate()</b> - Deletes all session items and session user ID.
<br>

<b>migrate($destroy = false)</b> - Deletes session user ID 
<br>

<b>isStarted()</b> - Determines whether the session was started.
<br>

<b>getId()</b> - returns the user ID .
<br>

<b>setId($id)</b> - sets the user ID .
<br>

<b>isValidId($id)</b> - Checks the format of the user session ID. Valid Latin numbers, letters 40 characters long.
<br>

<br>


# Features

<b>Isolation of sessions</b><br>
Session data for the same user, between different bots, is isolated. That is, you will not be able to get data from bot 
session No. 1 when the user accesses bot No. 2. Both sessions exist and are stored in the system.
<br>
<br>
<b>Store account data in a .env file</b><br>
According to best practices, you can store bot account credentials in a .env file. In the process of developing your 
application, account bot data will not pass to common repository of code to which a wide range of persons have access 
(or will have in the future). You can keep your credentials private. 
<br>
<br>
<b>Limits on the number of variables stored in a session</b><br>
There are no restrictions on the number of variables stored in the session and on the amount of information stored in 
the session, but bear in mind that when storing a large amount of information, the amount of RAM consumed will increase.
