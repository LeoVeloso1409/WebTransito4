<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
})->name('login');

Route::prefix('/webtransito')->group(function(){
    Route::get('/home', function(){
        return view('site.index');
    })->name('home');
    Route::get('/novo-ait', function(){
        return 'Novo Ait';
    })->name('novo_ait');
    Route::get('/editar-ait', function(){
        return view('site.edit');
    })->name('editar');
    Route::get('/register', function(){
        return view('site.register');
    })->name('register');
    Route::get('/meus-registros', function(){
        return view('site.meus_registros');
    })->name('registros');
    Route::get('/pesquisar', function(){
        return view('site.pesquisar');
    })->name('pesquisar');
});
