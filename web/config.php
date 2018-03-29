<?php

return [
    'database' => [
        'name' => 'pitches',
        'username' => '',
        'password' => '',
        'connection' => "mysql:host=;dbname=;charset=utf8",
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
