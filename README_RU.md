![alt text](https://github.com/shapoapps/assets/blob/master/very_small_banner1.jpg)
# multibot_driver v1.0 for Laravel:  

### Multibot for telegram, twilio whatsapp
### Session manager for telegram, twilio whatsapp

[English documentation](https://github.com/shapoapps/multibot_driver/blob/master/README_RU.md)

  При разработке чат ботов. Часто возникает потребность - сохранить на сервере
данные введенные пользователем, и использовать их при следующих обращениях пользователя. Например при навигации пользователя 
по каталогу товаров, навигации по меню с глубокой иерархией, оформлении новой покупки. Чтобы узнать какие данные пользователь 
ввел на предыдущем шаге, какое выбрал меню, какие параметры заказа были введены ранее. Для всех этих задач и не только 
используйте <b>multibot_driver</b>.

<b>multibot driver</b> позволяет вам хранить состояние пользователя.
Механизм работы multibot driver аналогичен механизму сессий для пользователей веб браузеров. При работе со стандартным модулем Laravel 
Sessions мы не можем использовать сессии для пользователей мессенджеров telegram, whatsapp. Потому что при получении нашим 
сервером нового сообщения от пользователя. Видно только одного посетителя. Этот посетитель всегда - сервер мессенджера. 
Для решения этой задачи и был создан <b>multibot driver</b>

В multibot driver есть функция - <b>мультибот</b>. Что это значит? Это значит - что теперь вы сможете оптимизировать свои расходы, 
разместив множество чат ботов всего на одном сервере, на одном экземпляре Laravel. Сможете настроить взаимодействие между 
несколькими разными чат ботами - в пределах одного экземпляра Laravel. 
Например сделать одинаковый функционал для telegram бота и twilio whatsapp бота. Сможете создавать боты спутники вашего 
основного бота, с дружественными SEO именами. Которые будут иметь одинаковый функционал с основным ботом. Тем самым 
увеличивая охват аудитории. Или другие варианты. <br>
Например следующие телеграм боты имеют одинаковый функционал и размещены на одном сервере, одном экземпляре Laravel: [get_your_telegram_id_bot](https://t.me/get_your_telegram_id_bot) ; [see_your_telegram_id_bot](https://t.me/see_your_telegram_id_bot) ; [know_your_telegram_id_bot](https://t.me/know_your_telegram_id_bot) ; [check_telegram_id_bot](https://t.me/check_telegram_id_bot) ; [see_telegram_id_bot](https://t.me/see_telegram_id_bot) ; [know_telegram_id_bot](https://t.me/know_telegram_id_bot)


<b>multibot_driver предназначен для чат ботов, использующих получение информации через Webhook.</b>

### Совместимость:<br>
Botman Telegram driver<br>
Irazasyed Telegram driver<br>
Twilio

### Протестирована работа следующих конфигураций:<br>
Botman Studio + Laravel (5.7 / 5.8) + multibot_driver<br>
Botman + Laravel 6.5.2 + multibot_driver<br>
Irazasyed + Laravel (5.7 / 5.8) + multibot_driver<br>
Irazasyed + Laravel 6.5.2 + multibot_driver<br>

Различия между Botman и Botman Studio:<br>
Botman Studio - пакет установленный совместно с экземпляром Laravel<br>
Botman - пакет установленный поверх существующего экземпляра Laravel<br>

<br>
<br>

# Оглавление
#### 1. [Установка](https://github.com/shapoapps/multibot_driver/blob/master/README_RU.md#%D1%83%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0)
#### 2. [Что такое <b>URI ключ</b>](https://github.com/shapoapps/multibot_driver/blob/master/README_RU.md#%D1%87%D1%82%D0%BE-%D1%82%D0%B0%D0%BA%D0%BE%D0%B5-uri-%D0%BA%D0%BB%D1%8E%D1%87-%D0%B8-%D0%B4%D0%BB%D1%8F-%D1%87%D0%B5%D0%B3%D0%BE-%D0%BE%D0%BD-%D0%BD%D1%83%D0%B6%D0%B5%D0%BD)
#### 3. [Примеры использования](https://github.com/shapoapps/multibot_driver/blob/master/README_RU.md#%D0%BF%D1%80%D0%B8%D0%BC%D0%B5%D1%80%D1%8B-%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)
#### 4. [Свойства и методы](https://github.com/shapoapps/multibot_driver/blob/master/README_RU.md#%D1%81%D0%B2%D0%BE%D0%B9%D1%81%D1%82%D0%B2%D0%B0-%D0%B8-%D0%BC%D0%B5%D1%82%D0%BE%D0%B4%D1%8B)
#### 5. [Особенности](https://github.com/shapoapps/multibot_driver/blob/master/README_RU.md#%D0%BE%D1%81%D0%BE%D0%B1%D0%B5%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D0%B8)


<br>
<br>

# Установка

<br>
<b>1.</b> установите Laravel (если не установлен)
<br>
<br>

<b>2.</b> установите <b>multibot_driver</b>
<br>

<b>2.1</b> composer require shapoapps/multibot_driver
<br>
  
<b>2.2</b> установите файл конфигурации <b>multibot_driver</b>
<br>
  
<b>2.2.1</b> Автоматически - введите в корневом каталоге Laravel команду - 
		` php artisan vendor:publish --provider="Shapoapps\MultibotDriver\Providers\ShapoappsMultibotServiceProvider" `
<br> 
    
<b>2.2.2</b> Или вручную, скопировав папку shapoapps из каталога установленного пакета `../vendor/shapoapps/multibot_driver/stubs/config` -> 
    в каталог конфигураций Laravel config. В результате должно получиться `config/shapoapps/shapoapps_multibot.php`
    и создайте каталог `/storage/framework/messenger_sessions`
<br>
    
<b>3.</b> в файле маршрутов Laravel - настройте маршруты для Webhooks ваших мессенджеров.

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

<b>4.</b> В конфигурационном файле вашего веб сервера - настройте входящие соединения (ссылки), для Webhooks ваших мессенджеров.
Пример для nginx
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
<b>5.</b> В файле конфигурации shapoapps_multibot.php заполните массив bots_list для всех ваших аккаунтов (инструкция по заполнению в 
конфигурационном файле).
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
Если вы хотите разделить боты на группы со специфическими настройками для каждой группы, заполните массив 
groups_specific_bots_settings , вы можете сами добавить для каждой группы ботов любые настройки, какие захотите. 

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
<b>6.</b> в файле .env - заполните все аккаунты ботов, которые собираетесь использовать. По аналогии с примером
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
TELEGRAM_BOT_NO1_INTERNAL_ID=1   #внутренний идентификатор бота, должен быть уникальным
TELEGRAM_BOT_NO1_BOT_GROUP=${BOT_GROUP_NO1}   #Группа к которой относится бот
TELEGRAM_BOT_NO1_BOT_API_KEY=123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp47  #API ключ телеграм бота
TELEGRAM_BOT_NO1_BOT_NAME=telegram_sample_one_bot    #имя телеграм бота
TELEGRAM_BOT_NO1_URI_KEY=FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1    # URI ключ телеграм бота
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

## Что такое URI ключ и для чего он нужен?


URI ключ - это уникальный идентификатор, который вы должны сгенерировать сами для каждого бота, формат идентификатора 40 символов 
английские цифры и буквы, например <b>5F39AF036C4A109A31DCC343C367593176C37CE0</b>. Для каждого бота должен быть сгененрирован
свой уникальный URI ключ. Для каждого бота URI ключ должен быть частью ссылки Webhook, и должен быть указан в файле 
конфигурации shapoapps_multibot.php в массиве bots_list например:


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

В качестве URI ключа можно использовать sha1 хеш, по поисковому запросу sha1 online hash generator - вы с легкостью
получите то что нужно.


<br>
<br>

# Примеры использования

<br>

<b>1</b> Irazasyed + multibot_driver - внешний запрос<br>



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

<b>2</b> Botman Studio + multibot_driver - внешний запрос<br>

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

<b>3</b> Botman Studio + multibot_driver - внутренний запрос (Laravel job)<br>

Пример отправки сообщения из задания Job:<br>


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

<b>4</b> Botman внешний запрос<br> 


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


# Свойства и методы

<br>

### Свойства и методы мультибота.
<br>

<b>ShapoappsMultibotDriver::setWebhooksForAllTelegramBots()</b> - Метод для массовой установки webhook на сервере Телеграм для всех ваших ботов telegram. Учтите, для успешного выполнения, в файле `.env` должны быть заполнены переменные, `TELEGRAM_BOT_NO1_WEBHOOK`, для каждого бота. В конфигурационном файле laravel -  `shapoapps.shapoapps_multibot`, каждый бот telegram должен иметь строку - ` 'bot_webhook' => env ('TELEGRAM_BOT_NO1_WEBHOOK', 'error'), ` .<br>
<br>




<b>ShapoappsMultibotDriver::$current_bot</b> - свойство, в котором содержится массив с параметрами текущего бота. 
Формат массива:
<br>
a:6:{s:15:"internal_bot_id";s:1:"1";s:9:"bot_group";s:1:"1";s:14:"messenger_type";s:8:"telegram";
s:11:"bot_api_key";s:45:"123456789:qFEoQc1vTS6r7hHLnR0z5H-3eGr9l-dTp47";s:8:"bot_name";s:24:"telegram_sample_one_bot";
s:7:"uri_key";s:40:"FDA73A4947FA5ADX4A0E5125AC63EF9C6C42Q7E1";}
<br>

<b>ShapoappsMultibotDriver::$is_internal_request</b> - свойство, при выполнении внутреннего запроса (например при выполнении Job) = true, для внешних
запросов (если запрос поступил от сервера мессенджера) = false.
<br>

<b>ShapoappsMultibotDriver::SetCurrentBotByInternalID($internal_bot_id)</b> - метод для ручной установки текущего бота по внутреннему идентификатору.
<br>

<b>ShapoappsMultibotDriver::SetCurrentBotByURIkey($bot_uri_key)</b> - метод для ручной установки текущего бота по ключу URI
<br>

<b>ShapoappsMultibotDriver::GetBotSettingsByInternalID($bot_internal_id)</b> - метод возвращает массив с параметрами бота для заданного внутреннего
идентификатора.
<br>

<b>ShapoappsMultibotDriver::GetBotsListForDesiredGroup($group_id)</b> - метод возвращает массив массивов параметров ботов для заданной группы.
<br>

<b>ShapoappsMultibotDriver::GetBotSettingsByURIkey($uri_key)</b> - метод возвращает массив с параметрами бота для заданного ключа URI
<br>

<b>ShapoappsMultibotDriver::GetBotSettingsByAPIkey($api_key)</b> - метод возвращает массив с параметрами бота для заданного API ключа.
<br>

<b>ShapoappsMultibotDriver::GetGroupSpecificSettingsForCurrentBot()</b> - метод возвращает массив с параметрами для группы текущего бота.
<br>

<b>ShapoappsMultibotDriver::CheckIsBotmanTelegramDriverInstalled()</b> - метод, если в системе установлен драйвер Botman telegram - возвращает true иначе false .
<br>

<b>ShapoappsMultibotDriver::CheckIsIrazasyedTelegramDriverInstalled()</b> - метод, если в системе установлен драйвер Irazasyed Telegram - возвращает true
иначе false.
<br>

<b>ShapoappsMultibotDriver::CheckIsTwilioBotmanDriverInstalled()</b> - метод, если в системе установлен драйвер Botman Twilio - возвращает true иначе 	
false.
<br>

<b>ShapoappsMultibotDriver::CheckIsMultibotModeEnabled()</b> - метод, если режим мультибота включен - возвращает true иначе false
<br>

<b>ShapoappsMultibotDriver::CheckIsMessengerSessionManagerEnabled()</b> - метод, если менеджер сессий включен - возвращает true иначе false
<br>

<b>ShapoappsMultibotDriver::get_uri_key_from_request_uri()</b> - метод, если входящий запрос содержит URI ключ, возвращает URI ключ, иначе null
<br>

<b>ShapoappsMultibotDriver::check_is_internal_request()</b> - метод, если входящий запрос поступил например от Laravel Job, - возвращает true иначе false.
<br>

<br>


### Свойства и методы менеджера сессий

Для доступа к объекту - используйте `$session_driver = resolve('session_driver_interface');` <br>



<b>$session_driver::$is_telegram_callback</b> - если поступил callback запрос от мессенджера telegram - возвращает true, иначе false.
<br>

<b>save()</b> - сохраняет данные сессии в хранилище.
<br>

<b>ageFlashData()</b> - состаривание флеш данных.
<br>

<b>all()</b> - возвращает массив со всеми данными сессии текущего пользователя.
<br>

<b>only(array $keys)</b> - Получить подмножество данных сессии.
<br>

<b>exists($key)</b> - проверяет, существует ли в сессии заданный ключ.
<br>

<b>has($key)</b> - проверяет, существует ли ключ и значение не null
<br>

<b>get($key, $default = null)</b> - возвращает элемент из сессии
<br>

<b>pull($key, $default = null)</b> - возвращает значение для заданного ключа и удаляет его.
<br>

<b>hasOldInput($key = null)</b> - определяет, содержится ли в сессии старый ввод.
<br>

<b>getOldInput($key = null, $default = null)</b> - возвращает значение для запрошенного ключа из флеш массива
<br>

<b>replace(array $attributes)</b> - заменяет заданные атрибуты сессии полностью.
<br>

<b>put($key, $value = null)</b> - добавляет пару ключ/значение или массив пар ключ/значение к сессии.
<br>

<b>remember($key, Closure $callback)</b> - возвращает элемент из сессии или сохраняет значение по умолчанию.
<br>

<b>push($key, $value)</b> - добавляет значение к массиву сессии
<br>

<b>increment($key, $amount = 1)</b> - увеличивает значение элемента сохраненного в сессии
<br>

<b>decrement($key, $amount = 1)</b> - уменьшает значение элемента сохраненного в сессии
<br>

<b>flash(string $key, $value = true)</b> - добавляет пару ключ/значение к флеш массиву _flash.new
<br>

<b>now($key, $value)</b> - добавляет пару ключ значение к флеш массиву _flash.old
<br>

<b>reflash()</b> - переносит все данные из массива _flash.old в массив _flash.new
<br>

<b>keep($keys = null)</b> - переносит заданный набор ключей 
<br>

<b>flashInput(array $value)</b> - добавляет заданный массив значений в массив - _old_input
<br>

<b>remove($key)</b> - возвращает элемент из сесии и удаляет его.
<br>

<b>forget($keys)</b> - удаляет один или несколько элементов из сессии.
<br>

<b>flush()</b> - удаляет все элементы из сессии.
<br>

<b>invalidate()</b> - удаляет все элементы сессии и идентификатор пользователя сессии.
<br>

<b>migrate($destroy = false)</b> - удаляет идентификатор пользователя сессии 
<br>

<b>isStarted()</b> - определяет, была ли сессия запущенна.
<br>

<b>getId()</b> - возвращает идентификатор пользователя
<br>

<b>setId($id)</b> - устанавливает идентификатор пользователя
<br>

<b>isValidId($id)</b> - проверяет формат идентификатора сессии пользователя. Допустимо латинские цифры, буквы длина 40 символов.
<br>

<b>IsSessionEmpty()</b> - если массивы данных сессии пустые - возвращает true, иначе false.
<br>


<br>


# Особенности

<b>Изоляция сессий</b><br>
Данные сессии для одного и того же пользователя, между разными ботами - изолированы. Тоесть вы не сможете получить 
данные из сессии бота №1, когда пользователь обращается к боту№2. При этом обе сессии существуют и хранятся в системе.
<br>
<br>
<b>Хранение данных аккаунтов в файле .env</b><br>
В соответствии с лучшими практиками, вы можете хранить учетные данные бот аккаунтов в .env файле. В процессе разработки 
вашего приложения данные бот аккаунтов не попадут в общий репозиторий кода, к которому имеют (или будут иметь в будущем) 
широкий круг лиц. Вы можете сохранить учетные данные приватными. 
<br>
<br>
<b>Ограничения на количество хранимых переменных в сессии</b><br>
Ограничения на количество переменных хранимых в сессии и на объем информации хранимой в сессии отсутствуют, но имейте 
ввиду, при хранении большого количества информации, объем потребляемой оперативной памяти - возрастет.

