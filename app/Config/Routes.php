<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
// $routes->set404Override();

$routes->set404Override(function ($message = null) {
    $data = [
        'title' => '404 - Page not found',
        'message' => $message,
    ];
    // return view('myError/404', $data);
    return view('auth/blocked', $data);
});


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
$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/auth', 'Auth::proses_login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::proses_register');
$routes->get('/ajax/kategori', 'Auth::ajaxKategori');


$routes->group('', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('/dashboard', 'Dashboard::index');

    $routes->get('profile', 'User::profile');
    $routes->get('profile/edit', 'User::editProfile');
    $routes->put('profile', 'User::updateProfile');

    $routes->get('gantipass', 'User::gantiPass');

    $routes->get('logbook/export', 'Export::exportLogbook');
    $routes->get('logbook/export/(:any)', 'Export::exportLogbook/$1');

    $routes->post('logbook/import', 'Logbook::import');
    $routes->get('logbook/excel', 'Export::excelLogbook');
    $routes->get('logbook/excel/(:any)', 'Export::excelLogbook/$1');



    $routes->post('gantipass', 'User::prosesGantiPass');
    $routes->get('user/active/(:num)/(:num)', 'User::active/$1/$2');
    $routes->resource('user');
    $routes->resource('kategori');
    $routes->resource('logbook');
});
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
