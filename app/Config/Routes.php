<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('user', 'User::login');
$routes->get('user/contact', 'User::contact');
$routes->match(['get', 'post'], 'user/check', 'User::check');
$routes->match(['get', 'post'], 'user/save', 'User::save');

$routes->get('admin', 'Admin::index');
$routes->get('admin/contact', 'Admin::contact');
$routes->get('admin/edit/(:num)', 'Admin::edit/$1');
$routes->put('admin/update/(:num)', 'Admin::update/$1');
$routes->delete('admin/delete/(:num)', 'Admin::delete/$1');

// check if the user is logged in before accessing admin routes

$routes->group('', ['filter' => 'AuthCheck'], function($routes) {
    $routes->get('/admin', 'Admin::index');
});

$routes->setAutoRoute(false);




