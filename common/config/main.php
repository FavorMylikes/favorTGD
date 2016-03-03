<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        custom the lessc command
//        'assetManager' => [
//            'converter' => [
//                'class' => 'yii\web\AssetConverter',
//                'commands' => [
//                    'less' => ['css', 'lessc {from} {to} --no-color'],
//                ],
//            ],
//        ],
    ],
    'name' => 'FavorTGD',

];
