<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');

$routes->post('/login', 'Login::doLogin');
$routes->post('/register', 'Register::doRegister');
