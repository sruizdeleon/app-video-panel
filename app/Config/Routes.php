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
$routes->get('/management/videos', 'VideoManagement::index');
$routes->get('/management/users', 'UsersManagement::index');
$routes->get('/users-management/editPage/(:num)', 'UsersManagement::editPage/$1');
$routes->get('/users-management/delete/(:num)', 'UsersManagement::delete/$1');

$routes->post('/login', 'Login::doLogin');
$routes->post('/logout', 'Login::doLogout');
$routes->post('/register', 'Register::doRegister');
$routes->post('/dashboard/createVideo', 'Video::createVideo');
$routes->post('/dashboard/updateVideo', 'Video::updateVideo');
$routes->post('/users-management/edit/(:num)', 'UsersManagement::editUser/$1');

