<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache'   => [
            'class' => 'yii\caching\FileCache',
        ],
        'db'      => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=boitoan',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf8',
        ],
        'mailer'  => [
            'class'            => 'yii\swiftmailer\Mailer',
            'viewPath'         => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'setting' => [
            'class' => 'common\components\Setting',
        ],
        'convert' => [
            'class' => 'common\components\Convert',
        ],
    ],
];
