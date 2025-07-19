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
$routes->get('/', 'Home::index');
$routes->get('/gantipassword', 'Home::gantipassword');
$routes->get('/home/updatepassword', 'Home::updatepassword');


$routes->get('/komik/create', 'Komik::create');
$routes->get('/komik/edit/(:segment)', 'Komik::edit/$1');
$routes->delete('/komik/(:num)', 'Komik::delete/$1');
$routes->get('/komik/(:any)', 'Komik::detail/$1');
// $routes->get('/entrydata', 'Entrydata::index');

$routes->get('/entrytujuanpd', 'Entrytujuanpd::index', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/tambahtujuanpd', 'Entrytujuanpd::tambahtujuanpd', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/savetujuanpd', 'Entrytujuanpd::savetujuanpd', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/(:num)', 'Entrytujuanpd::edittujuanpd/$1', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/updatetujuanpd', 'Entrytujuanpd::updatetujuanpd', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/saveindikatortujuanpd', 'Entrytujuanpd::saveindikatortujuanpd', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/edittujuanpddetail', 'Entrytujuanpd::edittujuanpddetail', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/updatetujuanpddetail', 'Entrytujuanpd::updatetujuanpddetail', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/hapustujuanpddetail', 'Entrytujuanpd::hapustujuanpddetail', ['filter' => 'role:user']);
$routes->get('/entrytujuanpd/hapustujuanpd', 'Entrytujuanpd::hapustujuanpd', ['filter' => 'role:user']);
$routes->get('/viewprintpdftujuanpd', 'Entrytujuanpd::viewprintpdftujuanpd', ['filter' => 'role:user']);

$routes->get('/entrysasaranpd', 'Entrysasaranpd::index', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/tambahsasaranpd', 'Entrysasaranpd::tambahsasaranpd', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/savesasaranpd', 'Entrysasaranpd::savesasaranpd', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/(:num)', 'Entrysasaranpd::editsasaranpd/$1', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/updatesasaranpd', 'Entrysasaranpd::updatesasaranpd', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/saveindikatorsasaranpd', 'Entrysasaranpd::saveindikatorsasaranpd', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/editsasaranpddetail', 'Entrysasaranpd::editsasaranpddetail', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/updatesasaranpddetail', 'Entrysasaranpd::updatesasaranpddetail', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/hapussasaranpddetail', 'Entrysasaranpd::hapussasaranpddetail', ['filter' => 'role:user']);
$routes->get('/entrysasaranpd/hapussasaranpd', 'Entrysasaranpd::hapussasaranpd', ['filter' => 'role:user']);
$routes->get('/viewprintpdfsasaranpd', 'Entrysasaranpd::viewprintpdfsasaranpd', ['filter' => 'role:user']);

//coba isi IPKD
$routes->get('/programopd', 'Formprogramopd::index', ['filter' => 'role:user']);

//coba scraping data
$routes->get('/printsipd', 'Printscraping::tesprintsipd', ['filter' => 'role:user']);
$routes->get('/printscraping/printsipd', 'Printscraping::printsipd', ['filter' => 'role:user']);

$routes->get('/mastervisi', 'Mastervisi::index', ['filter' => 'role:admin']);
$routes->get('/mastermisi', 'Mastermisi::index', ['filter' => 'role:admin']);
$routes->get('/mastermisi/(:num)', 'Mastermisi::editdatamisi/$1', ['filter' => 'role:admin']);
$routes->get('/mastersasaran', 'Mastersasaran::index', ['filter' => 'role:admin']);
$routes->get('/mastersasaran/sasarandetail', 'Mastersasaran::sasarandetail', ['filter' => 'role:admin']);
$routes->get('/mastersasaran/(:num)', 'Mastersasaran::editdatasasaran/$1', ['filter' => 'role:admin']);
$routes->get('/mastertujuan', 'Mastertujuan::index', ['filter' => 'role:admin']);
$routes->get('/mastertujuan/(:num)', 'Mastertujuan::editdatatujuan/$1', ['filter' => 'role:admin']);
$routes->get('/mastertujuan/tujuandetail', 'Mastertujuan::tujuandetail', ['filter' => 'role:admin']);
$routes->get('/masterusers', 'Masterusers::index', ['filter' => 'role:admin']);
$routes->get('/masterusers/(:num)', 'Masterusers::editdatauser/$1', ['filter' => 'role:admin']);
$routes->get('/masterusers/update/(:num)', 'Masterusers::update/$1', ['filter' => 'role:admin']);
$routes->get('/masterprinttujuanpd', 'Masterprinttujuanpd::index', ['filter' => 'role:admin']);
$routes->get('/masterprintpdftujuanpd/(:any)', 'Masterprinttujuanpd::masterprintpdftujuanpd/$1', ['filter' => 'role:admin']);
$routes->get('/masterprintsasaranpd', 'Masterprintsasaranpd::index', ['filter' => 'role:admin']);
$routes->get('/masterprintsasaranpd/(:any)', 'Masterprintsasaranpd::masterprintpdfsasaranpd/$1', ['filter' => 'role:admin']);

//musrenbang
$routes->get('/entryusulan', 'Entryusulanmusren::index', ['filter' => 'role:bidangadmin']);
$routes->get('/masterttd', 'Entryusulanmusren::masterttd', ['filter' => 'role:bidangadmin']);
$routes->get('/inputttdmaster', 'Entryusulanmusren::inputttdmaster', ['filter' => 'role:bidangadmin']);
$routes->get('/inputttddarimaster/(:any)', 'Entryusulanmusren::ambildarimasterttd/$1', ['filter' => 'role:bidangadmin']);
$routes->get('/inputttd/(:any)', 'Entryusulanmusren::inputttd/$1', ['filter' => 'role:bidangadmin']);
$routes->post('/savemasterttd', 'Entryusulanmusren::savemasterttd', ['filter' => 'role:bidangadmin']);
$routes->post('/savettd', 'Entryusulanmusren::savettd', ['filter' => 'role:bidangadmin']);
$routes->get('/saveambildarimasterttd/(:any)/(:any)', 'Entryusulanmusren::saveambildarimasterttd/$1/$2', ['filter' => 'role:bidangadmin']);
$routes->post('/deletemasterttd', 'Entryusulanmusren::deletemasterttd', ['filter' => 'role:bidangadmin']);
$routes->post('/deletettd', 'Entryusulanmusren::deletettd', ['filter' => 'role:bidangadmin']);
$routes->get('/detailusulan/(:any)', 'Entryusulanmusren::detailusulan/$1', ['filter' => 'role:bidangadmin']);
$routes->get('/detailprior/(:any)', 'Entryusulanmusren::detailprior/$1', ['filter' => 'role:bidangadmin']);
$routes->get('/detailttd/(:any)', 'Entryusulanmusren::detailttd/$1', ['filter' => 'role:bidangadmin']);
$routes->get('/nomorttd/(:any)', 'Entryusulanmusren::nomorttd/$1', ['filter' => 'role:bidangadmin']);
$routes->get('/inpunomorttd/(:any)', 'Entryusulanmusren::inputnomorttd/$1', ['filter' => 'role:bidangadmin']);
$routes->post('/savenomorttd', 'Entryusulanmusren::savenomorttd', ['filter' => 'role:bidangadmin']);
$routes->post('/deletenomorttd', 'Entryusulanmusren::deletenomorttd', ['filter' => 'role:bidangadmin']);
$routes->get('/entryusulanmusren/apigetdatamusren', 'Entryusulanmusren::apigetdatamusren', ['filter' => 'role:bidangadmin']);
$routes->get('/entryusulanmusren/apigetstatususulan', 'Entryusulanmusren::apigetstatususulan', ['filter' => 'role:bidangadmin']);
$routes->get('/entryusulanmusren/apigetdataprior', 'Entryusulanmusren::apigetdataprior', ['filter' => 'role:bidangadmin']);
$routes->get('/entryusulanmusren/apigetprior', 'Entryusulanmusren::apigetprior', ['filter' => 'role:bidangadmin']);
$routes->post('/entryusulanmusren/updatestatususulan', 'Entryusulanmusren::saveupdatestatususulan', ['filter' => 'role:bidangadmin']);
$routes->post('/entryusulanmusren/updateprior', 'Entryusulanmusren::saveupdateprior', ['filter' => 'role:bidangadmin']);
//musrenbang print ba sidang kelompok
$routes->get('/printbasidangkelompok/(:any)', 'Entryusulanmusren::printbasidangkelompok/$1', ['filter' => 'role:bidangadmin']);
$routes->get('/printlampiransdgkel/(:any)', 'Entryusulanmusren::printlampiransidangkelompok/$1', ['filter' => 'role:bidangadmin']);
$routes->get('/printlampiransdgkelx/(:any)', 'Entryusulanmusren::printlampiransidangkelompokx/$1', ['filter' => 'role:bidangadmin']);

//penandatanganan BA musren
$routes->get('/penandatanganan', 'Entryttd::index', ['filter' => 'role:bidangadmin']);
$routes->post('/penandatanganan/savepenandatanganan', 'Entryttd::savepenandatanganan', ['filter' => 'role:bidangadmin']);
$routes->post('/penandatanganan/deletepenandatanganan', 'Entryttd::deletepenandatanganan', ['filter' => 'role:bidangadmin']);

//cetak musrenbang
$routes->get('/printbamusrenbang', 'Cetakmusren::index', ['filter' => 'role:bidangadmin']);
$routes->get('/printlampiranba', 'Cetakmusren::printlamiran', ['filter' => 'role:bidangadmin']);

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
