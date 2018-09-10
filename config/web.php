<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 15:39
 */

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => env("COOKIE_VALIDATION_KEY"),
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'text/json' => '\yii\web\JsonParser'
            ],
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => true,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ]
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
//               指明 siteController下的action
                'site/<action>' => 'site/<action>',
                [
                    'class' => 'yii\rest\UrlRule',
                    'prefix' => 'api',
                    'controller' => ['v0/user', 'v0/car', 'v0/item', 'v0/order', 'v0/order-detail', 'v0/take'],
                    'pluralize' => false,
                ],
            ],
        ],
    ]
];



return $config;
