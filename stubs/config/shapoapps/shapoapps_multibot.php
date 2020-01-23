<?php

return [


    /*
    |--------------------------------------------------------------------------
    | MultiBot driver for messengers - settings.
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | Multibot driver :: mode
    |--------------------------------------------------------------------------
    |
    | If true - Multibot driver enabled.
    | If false - Multibot driver disabled.
    |
    |*/

    'multibot_mode' => env('MESSENGER_MULTIBOT_MODE', 'true'),



    /*
    |--------------------------------------------------------------------------
    | Multibote driver :: bots list
    |--------------------------------------------------------------------------
    |
    | bots_list contains all of your bots accounts. Supported messengers and drivers for now:
    | 		Telegram (Botman driver, Irazasyed driver); Viber (Shapoapps driver);
    |		Whatsapp, and other supported by Twilio messengers (Botman twilio driver).
    |		In course of time supported drivers and messengers list will be extend.
    |
    | internal_bot_id - required, unique. Type - string. Must be unique for each bot. You can use simple digits, for ex. 1 ,2, 3
    | bot_group - optional. Type - string. You can divide all bots on groups and make some specific actions (code) only for
    | 		desired bot group in your code flow. For example, you has 3 bots: telegram, viber, whatsapp - of same functionality
    |		internet shop. They can be consolidated by bot_group = 'internet_shop'.
    | messenger_type - required. Type - string. Type of messenger. Allowable values - telegram , viber, twilio.
    | bot_api_key - required. Type - string. API key for implement actions on messenger server side. Send messages, request user info and so on.
    | bot_name - optional. Type - string. Bot name if this property usefull for desired messenger type.
    | uri_key - required, unique. Type - string. 40 chars, only digits and latin letters, case insensetive. Uri key for each bot must be
    | 		unique value. To make this easy, try online sha1 hash generator.
    |
    |*/

    'bots_list' => [
        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO1_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO1_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO1_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO1_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO1_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO2_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO2_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO2_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO2_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO2_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO3_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO3_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO3_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO3_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO3_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO4_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO4_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO4_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO4_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO4_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO5_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO5_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO5_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO5_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO5_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO6_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO6_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO6_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO6_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO6_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO7_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO7_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO7_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO7_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO7_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO8_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO8_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO8_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO8_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO8_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TELEGRAM_BOT_NO9_INTERNAL_ID', 'error'),
            'bot_group' => env('TELEGRAM_BOT_NO9_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TELEGRAM', 'error'),
            'bot_api_key' => env('TELEGRAM_BOT_NO9_BOT_API_KEY', 'error'),
            'bot_name' => env('TELEGRAM_BOT_NO9_BOT_NAME', 'error'),
            'uri_key' => env('TELEGRAM_BOT_NO9_URI_KEY', 'error'),
        ],




        [
            'internal_bot_id' => env('VIBER_BOT_NO1_INTERNAL_ID', 'error'),
            'bot_group' => env('VIBER_BOT_NO1_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_VIBER', 'error'),
            'bot_api_key' => env('VIBER_BOT_NO1_BOT_API_KEY', 'error'),
            'bot_name' => env('VIBER_BOT_NO1_BOT_NAME', 'error'),
            'uri_key' => env('VIBER_BOT_NO1_URI_KEY', 'error'),
        ],

        [
            'internal_bot_id' => env('TWILIO_BOT_NO1_INTERNAL_ID', 'error'),
            'bot_group' => env('TWILIO_BOT_NO1_BOT_GROUP', 'error'),
            'messenger_type' => env('MESSENGER_TYPE_TWILIO_WHATSAPP', 'error'),
            'bot_api_key' => env('TWILIO_BOT_NO1_TOKEN', 'error'),
            'bot_name' => env('TWILIO_BOT_NO1_BOT_NAME', 'error'),
            'uri_key' => env('TWILIO_BOT_NO1_URI_KEY', 'error'),
            'twilio_sid' => env('TWILIO_BOT_NO1_SID', 'error'),
            'twilio_from_number' => env('TWILIO_BOT_NO1_FROM_NUMBER', 'error'),
        ],
    ],




    /*
        |--------------------------------------------------------------------------
        | Multibot driver :: list of settings specific for each bot group
        |--------------------------------------------------------------------------
        |
        | For example, you has 10 bots account/ Each account belongs to bot group number 1 or number 2.
        | Bot group 1 has 5 accounts with SEO friendly name for one bot application, with same logic for each of group bots.
        | Same with group 2, but its another application.
        | If there is 2 different application, mean they must have different database, right? You can define for each bot group own database
        | name or own mysql connection. And any other specific settings.
        |
        |
        |*/
    

    'groups_specific_bots_settings' => [
        [
            'bot_group' => env('BOT_GROUP_NO1', 'error'),
            'database_connection' => 'mysql_bot_1',
            'default_visitor_state' => '1',
        ],
        [
            'bot_group' => env('BOT_GROUP_NO2', 'error'),
            'database_connection' => 'mysql_bot_2',
            'default_visitor_state' => '1',
        ],

    ],





    /*
    |--------------------------------------------------------------------------
    | Session manager for messengers - settings.
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | Session manager for messengers :: mode
    |--------------------------------------------------------------------------
    |
    | If true - Session manager enabled. If false - Session manager disabled.
    |
    |*/

    'session_mode' => true,




    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
    |
    | Supported: "file", "database", "apc",
    |            "memcached", "redis"
    |
    */

    'driver' => env('MESSENGER_SESSION_DRIVER', 'file'),




    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to immediately expire on the browser closing, set that option.
    |
    */

    'lifetime' => env('MESSENGER_SESSION_LIFETIME', 120),



    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
    | should be encrypted before it is stored. All encryption will be run
    | automatically by Laravel and you can use the Session like normal.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When using the native session driver, we need a location where session
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for file sessions.
    |
    */

    'files' => storage_path('framework/messenger_sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => env('MESSENGER_SESSION_CONNECTION', null),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" session driver, you may specify the table we
    | should use to manage the sessions. Of course, a sensible default is
    | provided for you; however, you are free to change this as needed.
    |
    */

    'table' => 'messenger_sessions',

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | When using the "apc" or "memcached" session drivers, you may specify a
    | cache store that should be used for these sessions. This value must
    | correspond with one of the application's configured cache stores.
    |
    */

    'store' => env('MESSENGER_SESSION_STORE', null),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

];
