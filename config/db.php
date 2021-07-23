<?php

return [
    'class' => 'yii\db\Connection',

    //подключаем базу данных:
    'dsn' => 'mysql:host=localhost;dbname=yii2_mynews',
    //данные для входа в базу:
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
