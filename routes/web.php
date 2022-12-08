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
        return view('site.home');
    })->name('home');
    Route::get('/novo-ait', function(){
        return 'Novo Ait';
    })->name('novo_ait');
    Route::get('/pesquisar-ait', function(){
        return 'Pesquisar Ait';
    })->name('pesquisar_ait');
    Route::get('/register', function(){
        return view('site.register');
    })->name('register');
});
