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
$routes->get('/ies', 'Home::ies');
$routes->get('/nop', 'Home::nop');

//USERS
$routes->get('/user', 'User::index', ['filter' => 'role:superadmin']);
$routes->post('/user/listdata', 'User::listdata', ['filter' => 'role:superadmin']);
$routes->get('/user/index', 'User::index', ['filter' => 'role:superadmin']);
$routes->get('/user/register', 'User::register', ['filter' => 'role:superadmin']);
$routes->get('/user/edit/(:segment)', 'User::edit/$1', ['filter' => 'role:superadmin']);
$routes->post('/user/update/(:segment)', 'User::update/$1', ['filter' => 'role:superadmin']);
$routes->post('/user/aktif/(:segment)', 'User::aktif/$1', ['filter' => 'role:superadmin']);
$routes->post('/user/nonaktif/(:segment)', 'User::nonaktif/$1', ['filter' => 'role:superadmin']);
// $routes->post('/user/resetPassword/(:segment)', 'User::resetPassword/$1', ['filter' => 'role:superadmin']);
$routes->get('/user/role/(:segment)', 'User::role/$1', ['filter' => 'role:superadmin']);
$routes->post('/user/updateRole/(:segment)', 'User::updateRole/$1', ['filter' => 'role:superadmin']);
$routes->get('/user/changePassword/(:segment)', 'User::changePassword/$1', ['filter' => 'role:superadmin']);
$routes->post('/user/setPassword/(:segment)', 'User::setPassword/$1', ['filter' => 'role:superadmin']);
$routes->get('/user/changeSelfPassword/(:segment)', 'User::changeSelfPassword/$1');
$routes->post('/user/setSelfPassword/(:segment)', 'User::setSelfPassword/$1');
$routes->delete('/user/(:num)', 'User::delete/$1', ['filter' => 'role:superadmin']);

//SERVER FISIK
$routes->get('/serverfisik', 'ServerFisik::index');
$routes->get('/serverfisik/index', 'ServerFisik::index');
$routes->get('/serverfisik/dismantle', 'ServerFisik::dismantle');
$routes->get('/serverfisik/detail/(:segment)', 'ServerFisik::detail/$1');
$routes->get('/serverfisik/detail_dismantle/(:segment)', 'ServerFisik::detailDismantle/$1');
$routes->get('/serverfisik/create', 'ServerFisik::create');
$routes->post('/serverfisik/save', 'ServerFisik::save');
$routes->post('/serverfisik/saveExcel', 'ServerFisik::saveExcel');
$routes->get('/serverfisik/edit/(:segment)', 'ServerFisik::edit/$1');
$routes->post('/serverfisik/update/(:segment)', 'ServerFisik::update/$1');
$routes->post('/serverfisik/dismantlebtn/(:segment)', 'ServerFisik::dismantleBtn/$1', ['filter' => 'role:admin']);
$routes->post('/serverfisik/nondismantlebtn/(:segment)', 'ServerFisik::nonDismantleBtn/$1', ['filter' => 'role:admin']);
$routes->delete('/serverfisik/(:num)', 'ServerFisik::delete/$1');

//SERVER VM
$routes->get('/virtualmachine', 'VirtualMachine::index');
$routes->get('/virtualmachine/index', 'VirtualMachine::index');
$routes->get('/virtualmachine/detail/(:segment)', 'VirtualMachine::detail/$1');
$routes->get('/virtualmachine/create', 'VirtualMachine::create');
$routes->post('/virtualmachine/save', 'VirtualMachine::save');
$routes->post('/virtualmachine/saveExcel', 'VirtualMachine::saveExcel');
$routes->get('/virtualmachine/edit/(:segment)', 'VirtualMachine::edit/$1');
$routes->post('/virtualmachine/update/(:segment)', 'VirtualMachine::update/$1');
$routes->delete('/virtualmachine/(:num)', 'VirtualMachine::delete/$1');

//SERVER CLOUD
$routes->get('/cloud', 'Cloud::index');
$routes->get('/cloud/index', 'Cloud::index');
$routes->get('/cloud/detail/(:segment)', 'Cloud::detail/$1');
$routes->get('/cloud/create', 'Cloud::create');
$routes->post('/cloud/save', 'Cloud::save');
$routes->post('/cloud/saveExcel', 'Cloud::saveExcel');
$routes->get('/cloud/edit/(:segment)', 'Cloud::edit/$1');
$routes->post('/cloud/update/(:segment)', 'Cloud::update/$1');
$routes->delete('/cloud/(:num)', 'Cloud::delete/$1');

//VENDOR
$routes->get('/vendor', 'Vendor::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/vendor/index', 'Vendor::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/vendor/detail/(:segment)', 'Vendor::detail/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/vendor/create', 'Vendor::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/vendor/save', 'Vendor::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/vendor/saveExcel', 'Vendor::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/vendor/edit/(:segment)', 'Vendor::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/vendor/update/(:segment)', 'Vendor::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/vendor/(:num)', 'Vendor::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//KONTRAK
$routes->get('/kontrak', 'Kontrak::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kontrak/index', 'Kontrak::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kontrak/detail/(:segment)', 'Kontrak::detail/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kontrak/create', 'Kontrak::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kontrak/save', 'Kontrak::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kontrak/saveExcel', 'Kontrak::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kontrak/edit/(:segment)', 'Kontrak::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kontrak/update/(:segment)', 'Kontrak::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/kontrak/(:num)', 'Kontrak::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//RAK
$routes->get('/rak', 'Rak::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/rak/index', 'Rak::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/rak/detail/(:segment)', 'Rak::detail/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/rak/detail_server/(:segment)', 'Rak::detail_server/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/rak/create', 'Rak::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/rak/save', 'Rak::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/rak/saveExcel', 'Rak::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/rak/edit/(:segment)', 'Rak::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/rak/update/(:segment)', 'Rak::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/rak/(:num)', 'Rak::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//APPS
$routes->get('/apps', 'App::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/apps/index', 'App::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/apps/create', 'App::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/apps/save', 'App::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/apps/saveExcel', 'App::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/apps/edit/(:segment)', 'App::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/apps/update/(:segment)', 'App::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/apps/(:num)', 'App::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//OS
$routes->get('/os', 'Os::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/os/index', 'Os::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/os/create', 'Os::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/os/save', 'Os::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/os/saveExcel', 'Os::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/os/edit/(:segment)', 'Os::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/os/update/(:segment)', 'Os::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/os/(:num)', 'Os::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//Cluster
$routes->get('/cluster', 'Cluster::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/cluster/index', 'Cluster::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/cluster/create', 'Cluster::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/cluster/save', 'Cluster::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/cluster/saveExcel', 'Cluster::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/cluster/edit/(:segment)', 'Cluster::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/cluster/update/(:segment)', 'Cluster::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/cluster/(:num)', 'Cluster::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//Provider Cloud
$routes->get('/provider', 'Provider::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/provider/index', 'Provider::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/provider/create', 'Provider::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/provider/save', 'Provider::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/provider/saveExcel', 'Provider::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/provider/edit/(:segment)', 'Provider::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/provider/update/(:segment)', 'Provider::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/provider/(:num)', 'Provider::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//KC
$routes->get('/kantor_cabang', 'KantorCabang::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kantor_cabang/index', 'KantorCabang::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kantor_cabang/create', 'KantorCabang::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kantor_cabang/save', 'KantorCabang::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kantor_cabang/saveExcel', 'KantorCabang::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kantor_cabang/edit/(:segment)', 'KantorCabang::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kantor_cabang/update/(:segment)', 'KantorCabang::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/kantor_cabang/(:num)', 'KantorCabang::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//KCP
$routes->get('/kantor_cabang_pembantu', 'KantorCabangPembantu::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kantor_cabang_pembantu/index', 'KantorCabangPembantu::index', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kantor_cabang_pembantu/create', 'KantorCabangPembantu::create', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kantor_cabang_pembantu/save', 'KantorCabangPembantu::save', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kantor_cabang_pembantu/saveExcel', 'KantorCabangPembantu::saveExcel', ['filter' => 'role:superadmin, admin, operator']);
$routes->get('/kantor_cabang_pembantu/edit/(:segment)', 'KantorCabangPembantu::edit/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->post('/kantor_cabang_pembantu/update/(:segment)', 'KantorCabangPembantu::update/$1', ['filter' => 'role:superadmin, admin, operator']);
$routes->delete('/kantor_cabang_pembantu/(:num)', 'KantorCabangPembantu::delete/$1', ['filter' => 'role:superadmin, admin, operator']);

//Server Branch
$routes->get('/serverbranch', 'ServerBranch::index');
$routes->get('/serverbranch/index', 'ServerBranch::index');
$routes->get('/serverbranch/detail/(:segment)', 'ServerBranch::detail/$1');
$routes->get('/serverbranch/create', 'ServerBranch::create');
$routes->post('/serverbranch/save', 'ServerBranch::save');
$routes->post('/serverbranch/saveExcel', 'ServerBranch::saveExcel');
$routes->get('/serverbranch/edit/(:segment)', 'ServerBranch::edit/$1');
$routes->post('/serverbranch/action', 'ServerBranch::action');
$routes->post('/serverbranch/update/(:segment)', 'ServerBranch::update/$1');
$routes->delete('/serverbranch/(:num)', 'ServerBranch::delete/$1');

//PC Branch
$routes->get('/pcbranch', 'PcBranch::index');
$routes->get('/pcbranch/index', 'PcBranch::index');
$routes->get('/pcbranch/detail/(:segment)', 'PcBranch::detail/$1');
$routes->get('/pcbranch/create', 'PcBranch::create');
$routes->post('/pcbranch/save', 'PcBranch::save');
$routes->post('/pcbranch/saveExcel', 'PcBranch::saveExcel');
$routes->get('/pcbranch/edit/(:segment)', 'PcBranch::edit/$1');
$routes->post('/pcbranch/action', 'PcBranch::action');
$routes->post('/pcbranch/update/(:segment)', 'PcBranch::update/$1');
$routes->delete('/pcbranch/(:num)', 'PcBranch::delete/$1');

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
