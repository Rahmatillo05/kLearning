<?php
return [
    'id' => 'manager',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\modules\manager\controllers',
    'defaultRoute' => 'app',
    'components' => [
        'user' => [
            'class' => \yii\web\User::class,
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-teacher', 'httpOnly' => true],
        ],
        'errorHandler' => [
            'class' => \yii\web\ErrorHandler::class,
            'errorAction' => 'app/error',
        ],
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'scriptUrl' => '/manager/index.php',
            'rules' => [],
        ],
        'request' => [
            'class' => \yii\web\Request::class,
            'baseUrl' => '/manager',
            'csrfParam' => '_csrf-manager',
        ],
    ],
];