<?php

//Main
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');

//Users
$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
$router->get('login', 'UsersController@login');
$router->post('login', 'UsersController@verify');
$router->get('logout', 'UsersController@logout');

//Pitches
$router->get('pitch', 'PitchController@index');
$router->post('pitch', 'PitchController@store');
$router->get('edit', 'PitchController@getPitch');
$router->post('edit', 'PitchController@editPitch');
$router->post('like', 'PitchController@like');
