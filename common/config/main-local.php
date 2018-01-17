<?php
return [
  'components' => [
    'db' => [
      'class' => 'yii\db\Connection',
      'dsn' => 'pgsql:dbname=postgres;host=db;',
      'username' => 'postgres',
      'password' => '=',
      'charset' => 'utf8',
      'schemaMap' => [
        'pgsql' => [
          'class' => 'tigrov\pgsql\Schema',
          'defaultSchema' => 'public',
        ],
      ],
      'on afterOpen' => function ($event) {
          $event->sender->createCommand("SET search_path TO public;")->execute();
      },
    ],
    'mailer' => [
      'class' => 'yii\swiftmailer\Mailer',
      'viewPath' => '@common/mail',
      // send all mails to a file by default. You have to set
      // 'useFileTransport' to false and configure a transport
      // for the mailer to send real emails.
      'useFileTransport' => true,
    ],
    'view' => [
      'class' => 'yii\web\View',
      'renderers' => [
        'twig' => [
          'class' => 'yii\twig\ViewRenderer',
          'cachePath' => '@runtime/Twig/cache',
          // Array of twig options:
          'options' => [
            'auto_reload' => true,
          ],
          'globals' => [
            'html' => ['class' => '\yii\helpers\Html'],
          ]
        ],
      ],
    ],
  ],
];
