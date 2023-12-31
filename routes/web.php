<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    return view('dashboard');
})->name('Dashboard');

/*Route::get('/productos', function () {
    return view('productos.index');
})->name('ProductosIndex');*/

Route::get('/productos',[productosController::class, 'index'])->name('ProductosIndex');

Route::get('/productos/create',[productosController::class, 'create'])->name('ProductosCreate');

Route::post('/productos',[productosController::class, 'store'])->name('ProductosStore');

Route::get('/productos/{producto}/edit',[productosController::class, 'edit'])->name('ProductosEdit');

Route::patch('/productos/{producto}',[productosController::class, 'update'])->name('ProductosUpdate');

Route::delete('/productos/{producto}',[productosController::class, 'destroy'])->name('ProductosDestroy');

Route::get('/registro',[RegistroController::class, 'index'])->name('RegistroIndex');

Route::post('/registro',[RegistroController::class, 'store'])->name('RegistroStore');

Route::get('/muro',[MuroController::class, 'index'])->name('MuroIndex');

//login
Route::get('/login',[LoginController::class, 'index'])->name('LoginIndex');

Route::post('/login',[LoginController::class, 'store'])->name('LoginStore');

//logout
Route::post('/logout',[LogoutController::class, 'store'])->name('LogoutStore');
