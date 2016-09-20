<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $params['db_host'] . ';dbname=' . $params['db_base'],
    'username' => $params['db_user'],
    'password' => $params['db_pass'],
    'charset' => 'utf8',
];
