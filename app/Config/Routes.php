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

//USERS
$routes->get('/user', 'User::index', ['filter' => 'role:admin']);
$routes->get('/user/index', 'User::index', ['filter' => 'role:admin']);
$routes->get('/user/register', 'User::register', ['filter' => 'role:admin']);
$routes->get('/user/edit/(:segment)', 'User::edit/$1', ['filter' => 'role:admin']);
$routes->post('/user/update/(:segment)', 'User::update/$1', ['filter' => 'role:admin']);
// $routes->post('/user/resetPassword/(:segment)', 'User::resetPassword/$1', ['filter' => 'role:admin']);
$routes->get('/user/role/(:segment)', 'User::role/$1', ['filter' => 'role:admin']);
$routes->post('/user/updateRole/(:segment)', 'User::updateRole/$1', ['filter' => 'role:admin']);
$routes->delete('/user/(:num)', 'User::delete/$1', ['filter' => 'role:admin']);

//SERVER FISIK
$routes->get('/serverfisik', 'ServerFisik::index');
$routes->get('/serverfisik/index', 'ServerFisik::index');
$routes->get('/serverfisik/detail/(:segment)', 'ServerFisik::detail/$1');
$routes->get('/serverfisik/create', 'ServerFisik::create');
$routes->post('/serverfisik/save', 'ServerFisik::save');
$routes->post('/serverfisik/saveExcel', 'ServerFisik::saveExcel');
$routes->get('/serverfisik/edit/(:segment)', 'ServerFisik::edit/$1');
$routes->post('/serverfisik/update/(:segment)', 'ServerFisik::update/$1');
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
$routes->get('/vendor', 'Vendor::index', ['filter' => 'role:admin, operator']);
$routes->get('/vendor/index', 'Vendor::index', ['filter' => 'role:admin, operator']);
$routes->get('/vendor/detail/(:segment)', 'Vendor::detail/$1', ['filter' => 'role:admin, operator']);
$routes->get('/vendor/create', 'Vendor::create', ['filter' => 'role:admin, operator']);
$routes->post('/vendor/save', 'Vendor::save', ['filter' => 'role:admin, operator']);
$routes->post('/vendor/saveExcel', 'Vendor::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/vendor/edit/(:segment)', 'Vendor::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/vendor/update/(:segment)', 'Vendor::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/vendor/(:num)', 'Vendor::delete/$1', ['filter' => 'role:admin, operator']);

//KONTRAK
$routes->get('/kontrak', 'Kontrak::index', ['filter' => 'role:admin, operator']);
$routes->get('/kontrak/index', 'Kontrak::index', ['filter' => 'role:admin, operator']);
$routes->get('/kontrak/detail/(:segment)', 'Kontrak::detail/$1', ['filter' => 'role:admin, operator']);
$routes->get('/kontrak/create', 'Kontrak::create', ['filter' => 'role:admin, operator']);
$routes->post('/kontrak/save', 'Kontrak::save', ['filter' => 'role:admin, operator']);
$routes->post('/kontrak/saveExcel', 'Kontrak::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/kontrak/edit/(:segment)', 'Kontrak::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/kontrak/update/(:segment)', 'Kontrak::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/kontrak/(:num)', 'Kontrak::delete/$1', ['filter' => 'role:admin, operator']);

//RAK
$routes->get('/rak', 'Rak::index', ['filter' => 'role:admin, operator']);
$routes->get('/rak/index', 'Rak::index', ['filter' => 'role:admin, operator']);
$routes->get('/rak/detail/(:segment)', 'Rak::detail/$1', ['filter' => 'role:admin, operator']);
$routes->get('/rak/detail_server/(:segment)', 'Rak::detail_server/$1', ['filter' => 'role:admin, operator']);
$routes->get('/rak/create', 'Rak::create', ['filter' => 'role:admin, operator']);
$routes->post('/rak/save', 'Rak::save', ['filter' => 'role:admin, operator']);
$routes->post('/rak/saveExcel', 'Rak::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/rak/edit/(:segment)', 'Rak::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/rak/update/(:segment)', 'Rak::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/rak/(:num)', 'Rak::delete/$1', ['filter' => 'role:admin, operator']);

//APPS
$routes->get('/apps', 'App::index', ['filter' => 'role:admin, operator']);
$routes->get('/apps/index', 'App::index', ['filter' => 'role:admin, operator']);
$routes->get('/apps/create', 'App::create', ['filter' => 'role:admin, operator']);
$routes->post('/apps/save', 'App::save', ['filter' => 'role:admin, operator']);
$routes->post('/apps/saveExcel', 'App::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/apps/edit/(:segment)', 'App::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/apps/update/(:segment)', 'App::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/apps/(:num)', 'App::delete/$1', ['filter' => 'role:admin, operator']);

//OS
$routes->get('/os', 'Os::index', ['filter' => 'role:admin, operator']);
$routes->get('/os/index', 'Os::index', ['filter' => 'role:admin, operator']);
$routes->get('/os/create', 'Os::create', ['filter' => 'role:admin, operator']);
$routes->post('/os/save', 'Os::save', ['filter' => 'role:admin, operator']);
$routes->post('/os/saveExcel', 'Os::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/os/edit/(:segment)', 'Os::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/os/update/(:segment)', 'Os::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/os/(:num)', 'Os::delete/$1', ['filter' => 'role:admin, operator']);

//Cluster
$routes->get('/cluster', 'Cluster::index', ['filter' => 'role:admin, operator']);
$routes->get('/cluster/index', 'Cluster::index', ['filter' => 'role:admin, operator']);
$routes->get('/cluster/create', 'Cluster::create', ['filter' => 'role:admin, operator']);
$routes->post('/cluster/save', 'Cluster::save', ['filter' => 'role:admin, operator']);
$routes->post('/cluster/saveExcel', 'Cluster::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/cluster/edit/(:segment)', 'Cluster::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/cluster/update/(:segment)', 'Cluster::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/cluster/(:num)', 'Cluster::delete/$1', ['filter' => 'role:admin, operator']);

//Provider Cloud
$routes->get('/provider', 'Provider::index', ['filter' => 'role:admin, operator']);
$routes->get('/provider/index', 'Provider::index', ['filter' => 'role:admin, operator']);
$routes->get('/provider/create', 'Provider::create', ['filter' => 'role:admin, operator']);
$routes->post('/provider/save', 'Provider::save', ['filter' => 'role:admin, operator']);
$routes->post('/provider/saveExcel', 'Provider::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/provider/edit/(:segment)', 'Provider::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/provider/update/(:segment)', 'Provider::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/provider/(:num)', 'Provider::delete/$1', ['filter' => 'role:admin, operator']);

//Branch
$routes->get('/branch', 'Branch::index', ['filter' => 'role:admin, operator']);
$routes->get('/branch/index', 'Branch::index', ['filter' => 'role:admin, operator']);
$routes->get('/branch/create', 'Branch::create', ['filter' => 'role:admin, operator']);
$routes->post('/branch/save', 'Branch::save', ['filter' => 'role:admin, operator']);
$routes->post('/branch/saveExcel', 'Branch::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/branch/edit/(:segment)', 'Branch::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/branch/update/(:segment)', 'Branch::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/branch/(:num)', 'Branch::delete/$1', ['filter' => 'role:admin, operator']);

//Server Branch
$routes->get('/serverbranch', 'ServerBranch::index', ['filter' => 'role:admin, operator']);
$routes->get('/serverbranch/index', 'ServerBranch::index', ['filter' => 'role:admin, operator']);
$routes->get('/serverbranch/create', 'ServerBranch::create', ['filter' => 'role:admin, operator']);
$routes->post('/serverbranch/save', 'ServerBranch::save', ['filter' => 'role:admin, operator']);
$routes->post('/serverbranch/saveExcel', 'ServerBranch::saveExcel', ['filter' => 'role:admin, operator']);
$routes->get('/serverbranch/edit/(:segment)', 'ServerBranch::edit/$1', ['filter' => 'role:admin, operator']);
$routes->post('/serverbranch/update/(:segment)', 'ServerBranch::update/$1', ['filter' => 'role:admin, operator']);
$routes->delete('/serverbranch/(:num)', 'ServerBranch::delete/$1', ['filter' => 'role:admin, operator']);

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
