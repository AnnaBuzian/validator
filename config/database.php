<?php

if (getenv('REDIS_URL')) {
    $url = parse_url(getenv('REDIS_URL'));

    putenv('REDIS_HOST='.$url['host']);
    putenv('REDIS_PORT='.$url['port']);
    putenv('REDIS_PASSWORD='.$url['pass']);
}

if (getenv('DATABASE_URL')) {
    $url = getenv('DATABASE_URL');

    putenv('DB_HOST='.parse_url($url, PHP_URL_HOST));
    putenv('DB_PORT='.parse_url($url, PHP_URL_PORT));
    putenv('DB_DATABASE='.substr(parse_url($url, PHP_URL_PATH), 1));
    putenv('DB_USERNAME='.parse_url($url, PHP_URL_USER));
    putenv('DB_PASSWORD='.parse_url($url, PHP_URL_PASS));
}

return [
    'default' => env('DB_CONNECTION', 'pgsql'),

    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ]
    ],

    'migrations' => 'migrations',

    'redis' => [

        'client' => 'predis',

        'cache' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

        'session' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 1,
        ],

        'request' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 2,
        ],

    ],

];
