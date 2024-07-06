<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/register', 'Register::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/update-video', 'Video::index');

$routes->post('/login', 'Login::doLogin');
$routes->post('/register', 'Register::doRegister');
$routes->post('/dashboard/createVideo', 'Video::createVideo');
$routes->post('/dashboard/updateVideo', 'Video::updateVideo');
