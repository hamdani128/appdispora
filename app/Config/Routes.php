<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/auth/login', 'AuthController::index');
$routes->post('/auth/check', 'AuthController::check_login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/register', 'RegisterController::index');
$routes->post('/register/insert_register', 'RegisterController::insert_register');
$routes->get('/upload_ktp', 'RegisterController::upload_ktp');
$routes->post('register/save', 'RegisterController::save');
//
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    // home

    $routes->get('/', 'Home::index');
    $routes->get('/home/teknik/detail_performance', 'Home::teknik_performance');
    $routes->get('/home/fisik/detail_performance', 'Home::fisik_performance');
    $routes->post('/home/pelatih/show_detail', 'Home::show_detail_pelatih');
    $routes->post('/home/pelatih/update_profile_pelatih', 'Home::update_profile_pelatih');
    $routes->get('/profile', 'Home::profile_admin');
    // home atlet

    $routes->get('/home_atlet', 'Home::home_atlet');
    // home pelatih

    $routes->get('/home_pelatih', 'Home::home_pelatih');

    $routes->get('/data_register', 'Modul1Controller::index');
    $routes->get('/register/show_detail_register', 'Modul1Controller::detail_register');
    $routes->get('/register/show_detail_register_berkas', 'Modul1Controller::detail_register_berkas');
    $routes->post('/register/validasi', 'Modul1Controller::validasi');

    $routes->get('/cabor', 'Modul2Controller::index');
    $routes->get('/cabor/show_detail_cabor', 'Modul2Controller::detail_show_cabor');
    $routes->post('/cabor/save', 'Modul2Controller::save');
    $routes->post('/cabor/update', 'Modul2Controller::update');
    $routes->post('/cabor/delete', 'Modul2Controller::delete');

    $routes->get('/atlet', 'Modul3Controller::index');
    $routes->post('/atlet/show_detail_update', 'Modul3Controller::detail_show_update_atlet');
    $routes->post('/atlet/update', 'Modul3Controller::update_atlet');

    // Pelatih

    $routes->get('/pelatih', 'Modul3Controller::pelatih');
    $routes->post('/pelatih/save', 'Modul3Controller::save_pelatih');
    $routes->post('/pelatih/validasi', 'Modul3Controller::validasi_pelatih');
    $routes->post('/pelatih/show_detail_pelatih', 'Modul3Controller::detail_show_pelatih');
    $routes->post('/pelatih/update', 'Modul3Controller::update_pelatih');
    $routes->post('/pelatih/delete', 'Modul3Controller::delete_pelatih');

    // Modul Atlet
    $routes->get('/hasil_tes_teknik', 'Atlet1Controller::index');
    $routes->get('/hasil_tes_fisik', 'Atlet1Controller::view_fisik');

    // Pelatih
    $routes->get('/tes_teknik', 'Pelatih1Controller::index');
    $routes->post('/tes_teknik/detail_simpan', 'Pelatih1Controller::detail_simpan_teknik');
    $routes->post('/tes_teknik/simpan', 'Pelatih1Controller::simpan_teknik');
    $routes->post('/tes_teknik/delete', 'Pelatih1Controller::delete_teknik');
    $routes->get('/tes_teknik/detail_show', 'Pelatih1Controller::detail_show_teknik');
    $routes->get('/tes_teknik/detail_show_list', 'Pelatih1Controller::detail_show_teknik_list');

    $routes->get('/tes_fisik', 'Pelatih1Controller::view_fisik');
    $routes->post('/tes_fisik/simpan', 'Pelatih1Controller::simpan_fisik');
    $routes->post('/tes_fisik/detail_simpan', 'Pelatih1Controller::detail_simpan_fisik');
    $routes->post('/tes_fisik/delete', 'Pelatih1Controller::delete_fisik');
    $routes->get('/tes_fisik/detail_show', 'Pelatih1Controller::detail_show_fisik');
    $routes->get('/tes_fisik/detail_show_list', 'Pelatih1Controller::detail_show_fisik_list');

    $routes->get('/indikator_teknik', 'Pelatih2Controller::index');
    $routes->post('/indikator/teknik/save', 'Pelatih2Controller::save_teknik');
    $routes->post('/indikator_teknik/show_detail', 'Pelatih2Controller::detail_show_teknik');
    $routes->post('/indikator_teknik/update', 'Pelatih2Controller::update_teknik');
    $routes->post('/indikator_teknik/delete', 'Pelatih2Controller::delete_teknik');
    $routes->get('/indikator_teknik/kategori', 'Pelatih2Controller::data_kategori');
    $routes->post('/indikator_teknik/kategori/insert_kategori_teknik', 'Pelatih2Controller::insert_kategori_teknik');
    $routes->post('/indikator_teknik/kategori/delete_kategori_teknik', 'Pelatih2Controller::delete_kategori_teknik');

    // Fisik
    $routes->get('/indikator_fisik', 'Pelatih2Controller::view_fisik');
    $routes->post('/indikator/fisik/save', 'Pelatih2Controller::save_fisik');
    $routes->post('/indikator_fisik/show_detail', 'Pelatih2Controller::show_detail_fisik');
    $routes->post('/indikator_fisik/update', 'Pelatih2Controller::update_fisik');
    $routes->post('/indikator_fisik/delete', 'Pelatih2Controller::delete_fisik');
    $routes->get('/indikator_fisik/kategori_fisik', 'Pelatih2Controller::kategori_fisik');
    $routes->post('/indikator_fisik/insert_kategori_fisik', 'Pelatih2Controller::insert_kategori_fisik');
    $routes->post('/indikator_fisik/delete_kategori_fisik', 'Pelatih2Controller::delete_kategori_fisik');

    // Performansi
    $routes->get('/performansi/(:num)', 'PerformansiController::index/$1');
    // Info users active
    $routes->get('/users/info', 'InfoUsersController::index');

    // alumni
    $routes->get('/alumni_atlet', 'AlumniController::index');
    $routes->post('/alumni_atlet/save', 'AlumniController::save');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
