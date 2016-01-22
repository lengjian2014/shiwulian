<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
	    'db' => [
		    'class' => 'yii\db\Connection',
		    'dsn' => 'mysql:host=10.116.136.92;dbname=chanpinlian',
		    'username' => 'root',
		    'password' => 'www.splian.com',
		    'charset' => 'utf8',
	    ],
	    'mailer' => [
		    'class' => 'yii\swiftmailer\Mailer',
		    'viewPath' => '@common/mail',
		    // send all mails to a file by default. You have to set
		    // 'useFileTransport' to false and configure a transport
		    // for the mailer to send real emails.
		    'useFileTransport' => true,
	    ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'memcache' => [
	        'class' => 'yii\caching\MemCache',
	        'servers' => [
		        [
			        'host' => '10.116.136.92',
			        'port' => 11211,
			        'weight' => 100,
		        ],
	        ],
        ],
    ],
];
