<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'index/index',
    'modules' => [
	    'ucenter' => [
	    	'class' => 'frontend\modules\ucenter\Module',
	    ],
    ],
    'components' => [
		'urlManager' => [
		    'enablePrettyUrl' => true,
		    'showScriptName' => false,
		    //'suffix' => '.html',
		    'rules' => [
		    	'/' => 'index/index',
			    '<controller:\w+>/<action:\w+>/<id:\w+>'=>'<controller>/<action>',
			    '<module>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
		    ],
	    ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
