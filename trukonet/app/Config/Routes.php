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
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);
//$routes->get('/paketdata', 'Masterlist\Paket::getPaket');
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'authenticate']);
$routes->get('/home', 'Home::index', ['filter' => 'authenticate']);

$routes->group('register', function($routes){
    $routes->get('/', 'RegisterController::index');
    $routes->post('/', 'RegisterController::store');
});

$routes->group('login', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
    $routes->get('/', 'LoginController::index');
    $routes->post('/', 'LoginController::login');
});

$routes->group('logout', function ($routes) {
    $routes->get('/', 'LogoutController::index');
});

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authenticate']);
// $routes->get('/serverhardware', 'Master::load', ['filter' => 'authenticate']);
$routes->group('/serverhardware', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('/', 'Master::load');
    $routes->post('/', 'Masterlist\Serverhardware::updateRows');
});

$routes->group('/servercore', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('/', 'Master::load');
    $routes->post('/', 'Masterlist\Servercore::updateRows');
});

$routes->group('/odp', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('/', 'Master::load');
    $routes->post('/', 'Masterlist\Odp::updateRows');
});

$routes->group('/billpending', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('/', 'Billing::load');
    $routes->post('/', 'Billing\Billpending::updateRows');
});


$routes->get('/bumdesmalist', 'Master::load', ['filter' => 'authenticate']);
// $routes->get('/paket', 'Master::load', ['filter' => 'authenticate']);

$routes->group('/paket', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('/', 'Master::load');
    $routes->post('/', 'Masterlist\Paket::updateRows');
});

$routes->get('/orderlink', 'Pelanggan::load', ['filter' => 'authenticate']);
$routes->get('/customer', 'Pelanggan::load', ['filter' => 'authenticate']);

$routes->get('/billclose', 'Billing::load', ['filter' => 'authenticate']);
        
$routes->get('pages/(:any)', 'Pages::index/$1');
$routes->get('master/(:any)/(:any)', 'Master::index/$1/$2');

$routes->get('loadServer', 'Masterlist\Serverhardware::getRows');
$routes->get('loadserveradd', 'Masterlist\Serverhardware::index');
$routes->get('loadServerCombo', 'Masterlist\Serverhardware::getRowsCombo');

$routes->get('loadServercore', 'Masterlist\Servercore::getRows');
$routes->get('loadservercoreadd', 'Masterlist\Servercore::index');
$routes->get('loadCoreCombo', 'Masterlist\Servercore::getRowsCombo');

$routes->get('loadOdp', 'Masterlist\Odp::getRows');
$routes->get('loadodpdd', 'Masterlist\Odp::index');
$routes->get('loadratiocombo', 'Masterlist\Odp::getRatioCombo');

$routes->get('loadBma', 'Masterlist\Bumdesmalist::getRows');
$routes->get('loadbmaadd', 'Masterlist\Bumdesmalist::index');

$routes->get('loadPaket', 'Masterlist\Paket::getRows');


$routes->get('loadOrderlink', 'Pelanggan\OrderlinkController::getRows');
$routes->get('loadCustomer', 'Pelanggan\CustomerController::getRows');

$routes->get('loadregisteradd', 'Pelanggan\OrderlinkController::getRegisterLoad');
$routes->get('loadpaketcombo', 'Pelanggan\OrderlinkController::getPaketCombo');
$routes->get('loadakecamatancombo', 'Pelanggan\OrderlinkController::getKecamatanCombo');
$routes->get('loadadesacombo', 'Pelanggan\OrderlinkController::getDesaCombo');
$routes->get('loadadusuncombo', 'Pelanggan\OrderlinkController::getDusunCombo');
$routes->get('loadodpcombo', 'Pelanggan\OrderlinkController::getOdpCombo');

$routes->post('setRegister', 'Pelanggan\OrderlinkController::updateRegister');
$routes->get('genPassword', 'Pelanggan\OrderlinkController::generateRandomPassword');
$routes->get('loadpasang', 'Pelanggan\OrderlinkController::getPasangLoad');
$routes->post('setPasang', 'Pelanggan\OrderlinkController::updatePasang');
$routes->post('setOrderlink', 'Pelanggan\OrderlinkController::updateRows');
$routes->get('printlabel', 'Pelanggan\OrderlinkController::printlabel');
// $routes->get('sessionuser', 'Pelanggan\OrderlinkController::getsessionnama');

$routes->get('loadBillpending', 'Billing\Billpending::getRows');
$routes->post('billpayment', 'Billing\Billpending::setPayment');
$routes->get('billno', 'Billing\Billpending::setCode');

$routes->get('loadBillclose', 'Billing\Billclose::getRows');

$routes->get('printreceipt', 'Billing::printreceipt');


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
