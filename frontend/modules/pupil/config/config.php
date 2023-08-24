<?php
return [
    'id' => 'pupil',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\modules\pupil\controllers',
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
            'scriptUrl' => '/pupil/index.php',
            'rules' => [],
        ],
        'request' => [
            'class' => \yii\web\Request::class,
            'baseUrl' => '/pupil',
            'csrfParam' => '_csrf-teacher',
        ],
    ],

];