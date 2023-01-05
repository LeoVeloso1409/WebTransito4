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
/*
    Route::get('/home', function(){
        return view('ait.index');
    })->name('home');
    Route::get('/novo-ait', function(){
        return 'Novo Ait';
    })->name('novo_ait');
    Route::get('/editar-ait', function(){
        return view('ait.edit');
    })->name('editar');
    /*Route::get('/register', function(){
        return view('user.register');
    })->name('register');
    Route::get('/meus-registros', function(){
        return view('ait.meus_registros');
    })->name('registros');
    Route::get('/listar-usuarios', function(){
        return view('user.index');
    })->name('index.users');
    Route::get('/pesquisar', function(){
        return view('ait.pesquisar');
    })->name('pesquisar');
    */

    Route::get('register', 'UserController@create')->name('register.user');
    Route::post('register', 'UserController@store');
    Route::get('listar-usuarios', 'UserController@index')->name('index.users');
    Route::get('editar-usuario/{id}/{msg?}', 'UserController@edit')->name('edit.user');
    Route::put('editar-usuario/{id}/{msg?}', 'UserController@update');
    Route::delete('excluir-usuario/{id}', 'UserController@destroy')->name('delete.user');

    Route::resource('ait', 'AitController');

});
