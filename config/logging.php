<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'critical'),
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => SyslogUdpHandler::class,
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
            ],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ], 

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

        'medicneTrinction' => [
            'driver' => 'single',
            'channels' => ['medicneTrinction'],
            'path' => storage_path('logs/medicine _corner.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],
        
        'doctorpoint' => [
            'driver' => 'single',
            'channels' => ['doctorpoint'],
            'path' => storage_path('logs/Doctor_Point.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'others' => [
            'driver' => 'single',
            'channels' => ['others'],
            'path' => storage_path('logs/others.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'pathologi' => [
            'driver' => 'single',
            'channels' => ['pathologi'],
            'path' => storage_path('logs/Pathologi.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'cabinservice' => [
            'driver' => 'single',
            'channels' => ['cabinservice'],
            'path' => storage_path('logs/cabin_service.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'patientadvancecollection' => [
            'driver' => 'single',
            'channels' => ['patientadvancecollection'],
            'path' => storage_path('logs/Acceptance_of_patient_advance_and_collection_of_dues.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'sarjaribibag' => [
            'driver' => 'single',
            'channels' => ['sarjaribibag'],
            'path' => storage_path('logs/sarjari_bibag.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'agent' => [
            'driver' => 'single',
            'channels' => ['agent'],
            'path' => storage_path('logs/agent_data.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'employee' => [
            'driver' => 'single',
            'channels' => ['employee'],
            'path' => storage_path('logs/employee_data.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'patner' => [
            'driver' => 'single',
            'channels' => ['patner'],
            'path' => storage_path('logs/our_partner_details.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'kucrakoros' => [
            'driver' => 'single',
            'channels' => ['kucrakoros'],
            'path' => storage_path('logs/Kucra_kors.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],

        'borokorosh' => [
            'driver' => 'single',
            'channels' => ['borokorosh'],
            'path' => storage_path('logs/Boro_koroch_er_Kat.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            
        ],
    ],

];
