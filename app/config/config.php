<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

/**
 * @const APPLICATION_ENV Current application stage.
 */
defined('APPLICATION_ENV') || define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'local');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'mysql',
        'username'    => 'root',
        'password'    => 'secret',
        'dbname'      => 'gsviec',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri'        => '/',
    ],
    'mail'        => [
        'templatesDir' => 'mail/',
        'fromName'     => 'Phanbook',
        'fromEmail'    => 'phanbook@no-reply',
        'smtp'         => [
            'server'   => 'smtp.sendgrid.com',
            'port'     => '587',
            'security' => 'tls',
            'username' => '',
            'password' => '',
        ]
    ],
    'resque' => [
        'REDIS_BACKEND'     => 'localhost:6379',    // Set Redis Backend Info
        'REDIS_BACKEND_DB'  => '0',                 // Use Redis DB 0
        'COUNT'             => '1',                 // Run 1 worker
        'INTERVAL'          => '5',                 // Run every 5 seconds
        'QUEUE'             => '*',                 // Look in all queues
        'PREFIX'            => 'gsviec_',         // Prefix queues with test
        'VVERBOSE'          => '1',
        'APP_INCLUDE'       => 'run'
    ],
]);
