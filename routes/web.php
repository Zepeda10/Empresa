<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacionDetalleController;
use App\Http\Controllers\SesionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('sesion.index');
});


Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin');

Route::resource('admin/clientes',ClienteController::class);
Route::resource('admin/direccion',DireccionController::class);
Route::resource('admin/proveedores',ProveedorController::class);

Route::get('/admin/domicilios', 'App\Http\Controllers\ProveedorController@domicilios')->name('proveedores.domicilio');

Route::resource('admin/productos',ProductosController::class);
Route::resource('admin/servicios',ServicioController::class);

Route::resource('admin/usuarios',UsuarioController::class);
Route::resource('admin/cotizaciones',CotizacionController::class);
Route::resource('admin/detalles',CotizacionDetalleController::class);
Route::resource('sesion',SesionController::class);

Route::post('/sesion/loguearse', 'App\Http\Controllers\SesionController@loguearse')->name('sesion.login');
Route::get('/salir', 'App\Http\Controllers\SesionController@salir')->name('sesion.salir');
//Auth::routes();

///Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
