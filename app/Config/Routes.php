<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/register', 'UsersManagement::index');
$routes->get('/dashboard', 'Dashboard::index');

// Users
$routes->get('/management/users', 'UsersManagement::managementPage');
$routes->get('/management/create/users', 'UsersManagement::createPage');
$routes->get('/management/edit/users/(:num)', 'UsersManagement::editPage/$1');
$routes->get('/management/delete/users/(:num)', 'UsersManagement::delete/$1');

// Videos GET
$routes->get('/management/videos', 'VideosManagement::index');
$routes->get('/management/create/videos', 'VideosManagement::createPage');
$routes->get('/management/edit/videos/(:num)', 'VideosManagement::editPage/$1');
$routes->get('/management/delete/videos/(:num)', 'VideosManagement::deleteVideo/$1');


// Session POST
$routes->post('/login', 'Login::doLogin');
$routes->post('/logout', 'Login::doLogout');


// Users POST
$routes->post('/management/create/users', 'UsersManagement::createUser');
$routes->post('/management/edit/users/(:num)', 'UsersManagement::editUser/$1');

// Videos POST
$routes->post('/management/create/videos', 'VideosManagement::createVideo');
$routes->post('/management/edit/videos/(:num)', 'VideosManagement::editVideo/$1');