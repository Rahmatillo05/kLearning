<?php

use yii\web\ErrorHandler;
use yii\web\Session;
use yii\web\User;

return [
    'id' => 'teacher',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\modules\teacher\controllers',
    'defaultRoute' => 'app',
    'components' => [
        'session' => [
            'class' => Session::class,
            'name' => 'kelajak-edu-teacher',
        ],
        'user' => [
            'class' => User::class,
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-teacher', 'httpOnly' => true],
        ],
        'errorHandler' => [
            'class' => ErrorHandler::class,
            'errorAction' => 'app/error',
        ],
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'scriptUrl' => '/teacher/index.php',
            'rules' => [
                'course/<slug>' => 'course/view',
            ],
        ],
        'request' => [
            'class' => \yii\web\Request::class,
            'baseUrl' => '/teacher',
            'csrfParam' => '_csrf-teacher',
        ],
    ],

];