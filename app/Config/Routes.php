<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/detail', 'home::detail');
$routes->get('/about', 'home::about');
$routes->get('/contact', 'home::contact');
$routes->get('/testimony', 'home::testimony');

$routes->get('/admin', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/login/process', 'Auth::valid_login');
$routes->post('/register/process', 'Auth::valid_register');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Admin::dashboard');

$routes->get('/data/pesanan', 'Pesanan::index');
$routes->get('/pesanan/new', 'Pesanan::create');
$routes->post('/pesanan/create', 'Pesanan::store');
$routes->get('/pesanan/edit/(:segment)', 'Pesanan::edit/$1');
$routes->post('/pesanan/update/(:segment)', 'Pesanan::update/$1');
$routes->delete('/pesanan/delete/(:segment)', 'Pesanan::delete/$1');

$routes->get('/data/paket', 'Paket::index');
$routes->get('/paket/new', 'Paket::create');
$routes->post('/paket/store', 'Paket::store');
$routes->get('/paket/edit/(:segment)', 'Paket::edit/$1');
$routes->post('/paket/update/(:segment)', 'Paket::update/$1');
$routes->delete('/paket/delete/(:segment)', 'Paket::delete/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
