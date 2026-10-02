<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/profile', 'Profile::index');
$routes->get('/about', 'About::index');
$routes->get('/customers', 'Customers::index');
$routes->get('/customers/new', 'Customers::create');
$routes->post('/customers', 'Customers::store');
$routes->get('/customers/(:num)/edit', 'Customers::edit/$1');
$routes->post('/customers/(:num)/update', 'Customers::update/$1');
$routes->get('/users', 'Users::index');
$routes->get('/users/new', 'Users::create');
$routes->post('/users', 'Users::store');
$routes->get('/users/(:num)/edit', 'Users::edit/$1');
$routes->post('/users/(:num)/update', 'Users::update/$1');
