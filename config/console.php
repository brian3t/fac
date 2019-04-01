<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');
Yii::setAlias('@runnerScript', dirname(__DIR__) . '/yii');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/console.log',
                    'levels' => ['error', 'warning'],
//                    'levels' => ['error', 'warning', 'profile'],
//                    'categories'=>['yii\db\*']
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
    'controllerMap' => [
        /*'cron' => [
            'class' => 'mitalcoi\cronjobs\CronController',
            'cronJobs' =>[
                'test/example1' => [
                    'cron'      => '* * * * *',
                ],

            ],
        ],*/
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
