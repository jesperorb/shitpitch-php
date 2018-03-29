<?php

use App\Core\App;

App::bind('config', require 'local-config.php');

App::bind(
    'pitches',
    new Pitches(
    Connection::make(App::get('config')['database'])
)
);
App::bind(
    'users',
    new Users(
    Connection::make(App::get('config')['database'])
)
);

function view($name, $data = [])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}
