<?php

$router->get('', 'PagesController@index');
$router->get('contact', 'PagesController@contact');
$router->get('about', 'PagesController@about');
$router->get('about/culture', 'PagesController@aboutCulture');

$router->get('users/all', 'UsersController@all');
$router->post('user/add', 'UsersController@store');