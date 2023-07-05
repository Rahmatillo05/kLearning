<?php
return [
    'id' => 'app-teacher',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\modules\teacher\controllers',
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
            'scriptUrl' => '/teacher/index.php',
            'rules' => [],
        ],
        'request' => [
            'class' => \yii\web\Request::class,
            'baseUrl' => '/teacher',
            'csrfParam' => '_csrf-teacher',
        ],
    ],

];