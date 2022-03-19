<?php

declare(strict_types=1);

use Monolog\Logger;

return [
    'globalLevel' => Logger::DEBUG,
    'handlers' => [
        'console' => [
            [
                'class' => \Monolog\Handler\SyslogHandler::class,
                'options' => [
                    'ident' => 'spiral-app',
                ]
            ]
        ],
        'sql_logs' => [
            [
                'class' => \Monolog\Handler\RotatingFileHandler::class,
                'options' => [
                    'filename' => __DIR__ . '/../../runtime/logs/sql.log'
                ]
            ]
        ]
    ],
];
