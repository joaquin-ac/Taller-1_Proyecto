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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/Acevedo_ignacio/quienes_somos', 'Home::quienes_somos');
$routes->add('/Acevedo_ignacio/contactos', 'Home::contactos');
$routes->match(['get', 'post'], '/Acevedo_ignacio/contactos/enviar', 'consultasController::store');
$routes->add('/Acevedo_ignacio/comercializacion', 'Home::comercializacion');
$routes->add('/Acevedo_ignacio/term_y_usos', 'Home::term_y_usos');

$routes->add('/Acevedo_ignacio/usuarios/', 'usuariosController::index');
$routes->add('/Acevedo_ignacio/usuarios/(:any)', 'usuariosController::index/$1');
$routes->post('/Acevedo_ignacio/agregarUsuario', 'usuariosController::insertar');
$routes->add('/Acevedo_ignacio/editarUsuario/(:num)', 'usuariosController::editar/$1');
$routes->post('/Acevedo_ignacio/actualizarUsuario/(:num)', 'usuariosController::actualizar/$1');
$routes->add('/Acevedo_ignacio/borrarUsuario/(:num)', 'usuariosController::borrar/$1');

$routes->add('/Acevedo_ignacio/productos/', 'productosController::index');
$routes->add('/Acevedo_ignacio/productos/(:any)', 'productosController::index/$1');
$routes->post('/Acevedo_ignacio/agregarProducto', 'productosController::insertar');
$routes->add('/Acevedo_ignacio/editarProducto/(:num)', 'productosController::editar/$1');
$routes->post('/Acevedo_ignacio/actualizarProducto/(:num)', 'productosController::actualizar/$1');
$routes->add('/Acevedo_ignacio/borrarProducto/(:num)', 'productosController::borrar/$1');

$routes->add('/Acevedo_ignacio/registro', 'registroController::index');
$routes->match(['get', 'post'], '/Acevedo_ignacio/registro/store', 'registroController::store');
$routes->match(['get', 'post'], '/Acevedo_ignacio/login/loginAuth', 'loginController::loginAuth');
$routes->add('/Acevedo_ignacio/login', 'loginController::index');
$routes->add('/Acevedo_ignacio/cerrar_sesion', 'logoutController::index');
$routes->add('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->add('/Acevedo_ignacio/edit_perfil', 'editarUserController::index');
$routes->match(['get', 'post'], '/Acevedo_ignacio/edit_perfil/store', 'editarUserController::store');
$routes->add('/Acevedo_ignacio/edit_pass', 'editarUserController::pass');
$routes->match(['get', 'post'], '/Acevedo_ignacio/edit_pass/changePass', 'editarUserController::changePass');

$routes->add('/Acevedo_ignacio/catalogo', 'catalogoController::index');

$routes->add('/Acevedo_ignacio/carrito', 'carritoController::index');
$routes->add('/Acevedo_ignacio/agregarCarrito/(:num)', 'carritoController::agregar/$1');
$routes->add('/Acevedo_ignacio/eliminarUnidadCarrito/(:num)', 'carritoController::eliminarUnidad/$1');
$routes->add('/Acevedo_ignacio/eliminarCarrito/(:num)', 'carritoController::eliminar/$1');
$routes->add('/Acevedo_ignacio/vaciarCarrito/', 'carritoController::vaciarCarrito');

$routes->add('/Acevedo_ignacio/consultas', 'consultasController::ver');
$routes->add('/Acevedo_ignacio/consultas/(:any)', 'consultasController::ver/$1');
$routes->add('/Acevedo_ignacio/borrarConsulta/(:num)', 'consultasController::borrarConsulta/$1');
$routes->add('/Acevedo_ignacio/visualizarConsulta/(:num)', 'consultasController::visualizarConsulta/$1');

$routes->add('/Acevedo_ignacio/facturacion', 'carritoController::facturacion');

$routes->add('/Acevedo_ignacio/facturas', 'facturasController::index');
$routes->add('/Acevedo_ignacio/visualizarfactura/(:num)', 'facturasController::ver/$1');

$routes->get('upload', 'Upload::index');          // Add this line.
$routes->post('upload/upload', 'Upload::upload'); // Add this line.

$routes->add('/Acevedo_ignacio/historial', 'editarUserController::historial');
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
