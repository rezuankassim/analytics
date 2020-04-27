<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'clients'
], function () {
    Route::get('/', 'ClientController@index')->name('clients.index');
    Route::get('/create', 'ClientController@create')->name('clients.create');
    Route::post('/', 'ClientController@store')->name('clients.store');
    Route::get('/{client}/edit', 'ClientController@edit')->name('clients.edit');
    Route::post('/{client}', 'ClientController@update')->name('clients.update');
    Route::delete('/{client}', 'ClientController@destroy')->name('clients.destroy');

    Route::post('/{client}/credentials', 'ClientCredentialController@store')->name('clients_credentials.store');

    Route::get('/{client}/analytics', 'ClientAnalyticController@index')->name('clients_analytics.index');

    Route::post('/{client}/analytics/filter', 'ClientAnalyticFilterController@update')->name('clients_analytics_filter.update');

    Route::group([
        'prefix' => 'clients/{client}'
    ], function () {
        Route::get('subclients', 'SubclientController@index')->name('subclients.index');
        Route::get('subclients/create', 'SubclientController@create')->name('subclients.create');
        Route::get('subclients/{subclient}', 'SubclientController@edit')->name('subclients.edit');
        
        Route::get('subclients/{subclient}/analytics', 'SubclientAnalyticController@index')->name('subclients_analytics.index');
    });
});



