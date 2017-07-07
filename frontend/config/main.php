<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.min.css' : 'css/bootstrap.css',
                    ],
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.min.js' : 'js/bootstrap.js',
                    ]
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => '5SxrjTp584IYFcNEdP_-UG4myiNycpvp',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'product/index',
                'sitemap.xml' => 'sitemap/index',
                'blog' => 'blog/index',
                'blog/<slug>' => 'blog/detail',
                'san-pham' => 'product/list',
                'search' => 'product/search',
                '<slug>' => 'product/detail',
                'page/<slug>' => 'page/detail',
                'category/<slug>' => 'product/category',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'menu' => [
            'class' => 'frontend\components\MenuComponent',
        ],
        'category' => [
            'class' => 'frontend\components\CategoryComponent',
        ],
        'post' => [
            'class' => 'frontend\components\PostComponent',
        ],
    ],
    'params' => $params,
];
