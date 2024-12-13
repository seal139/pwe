<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'KamarController::index');
$routes->get('/kamar', 'KamarController::index');
$routes->get('/kamardetail/(:num)', 'KamarController::detailkamar/$1');
$routes->get('/book/(:num)', 'BookingController::book/$1');
$routes->post('/storeBooking', 'BookingController::storeBooking');
$routes->get('search', 'KamarController::search');
$routes->get('user/login', 'UserController::login');
$routes->get('user/logout', 'UserController::logout');
$routes->post('user/authenticate', 'UserController::authenticate');
$routes->get('user/register', 'UserController::register');
$routes->post('user/storeUser', 'UserController::storeUser');
