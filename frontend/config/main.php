<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'teacher' => [
            'class' => 'frontend\modules\teacher\Teacher',
            'layout' => 'main'
        ],
        'pupil' => [
            'class' => 'frontend\modules\pupil\Pupil',
            'layout' => 'main'
        ],
        'parent' => [
            'class' => 'frontend\modules\parent\Parents',
            'layout' => 'main'
        ],
        'manager' => [
            'class' => 'frontend\modules\manager\Manager',
            'layout' => 'main'
        ],
        'owner' => [
            'class' => 'frontend\modules\owner\Owner',
            'layout' => 'main'
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'kelajak-edu',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'scriptUrl' => '/index.php',
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
