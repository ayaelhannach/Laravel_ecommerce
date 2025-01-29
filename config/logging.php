<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |----------------------------------------------------------------------
    | Default Log Channel
    |----------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |----------------------------------------------------------------------
    | Deprecations Log Channel
    |----------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => false,  // Disable stack traces for deprecations
    ],

    /*
    |----------------------------------------------------------------------
    | Log Channels
    |----------------------------------------------------------------------
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

        // Stack Channel: Combines multiple channels into one.
        // In this case, it combines the 'single' channel, meaning all logs go to a single log file.
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],  // Define the stack of channels (single here)
            'ignore_exceptions' => false,  // Whether to ignore exceptions or not.
        ],

        // Single Channel: Writes all logs to a single file (laravel.log).
        // Ideal for simple logging without rotating or archiving.
        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),  // Minimum log level (debug means all logs are captured).
        ],

        // Daily Channel: Rotates logs daily and keeps them for a specific number of days (14 in this case).
        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,  // Keep logs for 14 days, after which they are automatically deleted.
        ],

        // Slack Channel: Sends critical log messages to a Slack channel.
        // Useful for real-time monitoring and alerts.
        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),  // Slack webhook URL for sending logs
            'username' => 'Laravel Log',  // Slack username for the bot that will send messages
            'emoji' => ':boom:',  // Emoji used in Slack messages
            'level' => env('LOG_LEVEL', 'critical'),  // Logs critical-level messages to Slack.
        ],

        // Papertrail Channel: Sends logs to Papertrail, a service for centralized log management.
        // Logs are securely transmitted over UDP.
        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),  // Handler for sending logs to Papertrail
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),  // Papertrail server URL
                'port' => env('PAPERTRAIL_PORT'),  // Papertrail server port
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),  // Connection string for secure communication
            ],
        ],

        // Stderr Channel: Sends logs to the standard error stream.
        // Useful for logging in CLI-based applications or containers.
        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,  // Stream handler for stderr
            'formatter' => env('LOG_STDERR_FORMATTER'),  // Formatter for stderr logs
            'with' => [
                'stream' => 'php://stderr',  // Defines the stream (stderr) for logs
            ],
        ],

        // Syslog Channel: Sends logs to the system's syslog service.
        // Ideal for applications running on servers that aggregate logs via syslog.
        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),  // Logs all messages at or above this level
        ],

        // Errorlog Channel: Sends logs to PHP's built-in error log.
        // Useful for logging in environments like shared hosting.
        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),  // Logs all messages at or above this level
        ],

        // Null Channel: A special channel that discards all log messages.
        // Used for disabling logging or in testing environments where no logs are needed.
        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,  // Null handler discards all log messages
        ],

        // Emergency Channel: A special channel for logging critical errors.
        // Logs are written to the emergency log file (laravel.log).
        'emergency' => [
            'path' => storage_path('logs/laravel.log'),  // Path for the emergency log file
        ],
        'database' => [
            'driver' => 'custom',
            'via' => App\Logging\DatabaseLogger::class,
            'level' => 'debug',
        ],
    
    ],

];
