<?php

use App\Http\Controllers\WebTransitoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

    Route::get('user-register', 'UserController@create')->name('register.user');
    Route::post('user-register', 'UserController@store');
    Route::get('listar-usuarios', 'UserController@index')->name('index.users');
    Route::get('editar-usuario/{id}/{msg?}', 'UserController@edit')->name('edit.user');
    Route::put('editar-usuario/{id}/{msg?}', 'UserController@update');
    Route::delete('excluir-usuario/{id}', 'UserController@destroy')->name('delete.user');
    Route::get('pesquisar-usuarios', 'WebTransitoController@PesquisarUsers')->name('pesquisar.user');
    Route::post('pesquisar-usuarios', 'WebTransitoController@BuscarUsers')->name('pesquisar.user');

    Route::get('ait', 'AitController@index')->name('ait.index');
    Route::get('ait-create', 'AitController@create')->name('ait.create');
    Route::post('ait-create', 'AitController@store')->name('ait.store');
    Route::get('ait-edit/{ait}', 'AitController@edit')->name('ait.edit');
    Route::patch('ait-edit/{ait}', 'AitController@update')->name('ait.update');

    Route::get('meus-registros', 'WebTransitoController@BuscarMeusRegistros')->name('aits.meus.registros');
    Route::get('pesquisar-aits', 'WebTransitoController@PesquisarAits')->name('aits.pesquisar');
    Route::post('pesquisar-aits', 'WebTransitoController@BuscarAits')->name('aits.pesquisar');

    //Route::resource('ait', 'AitController');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
