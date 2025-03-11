<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',            
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
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

        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => ['account', 'billing', 'payment','reading-data','schedule','field-finding','inspection-subject','reading','location','meter-size','classification','water-rate','computation','photo','view-reading','unscheduled-reading','unscheduled-photo','mobile-user'],
                    'tokens' => [
                        '{id}' => '<id:[\\w\\-]+>', // Allows 'id' to match alphanumeric characters and dash
                    ],                
                ],
                
                ['class' => 'yii\rest\UrlRule', 'controller' => 'account', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'billing', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'payment', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'reading-schedule', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'reading-data', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'schedule', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'field-finding', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'inspection-subject', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'reading', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'location', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'meter-size', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'classification', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'water-rate', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'computation', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'photo', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'view-reading', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'unscheduled-reading', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'unscheduled-photo', 'pluralize' => true],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'mobile-user', 'pluralize' => true],
            ],
        ],
    ],
    'params' => $params,
];
