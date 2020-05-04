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

Route::redirect('/', '/login', 301)->name('welcome');

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
    Route::put('/{client}', 'ClientController@update')->name('clients.update');
    Route::delete('/{client}', 'ClientController@destroy')->name('clients.destroy');

    Route::get('/{client}/apps', 'ClientAppController@index')->name('clients_apps.index');

    Route::get('/{client}/analytics', 'ClientAnalyticController@index')->name('clients_analytics.index');
    Route::post('/{client}/analytics/filter', 'ClientAnalyticFilterController@update')->name('clients_analytics_filter.update');
});


Route::group([
    'middleware' => ['auth'],
    'prefix' => 'projects',
], function () {
    Route::get('/', 'ProjectController@index')->name('projects.index');
    Route::get('/create', 'ProjectController@create')->name('projects.create');
    Route::post('/', 'ProjectController@store')->name('projects.store');
    Route::get('/{project}/edit', 'ProjectController@edit')->name('projects.edit');
    Route::put('/{project}', 'ProjectController@update')->name('projects.update');

    Route::put('/{project}/credentials', 'ProjectCredentialController@update')->name('projects_credentials.update');
});

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'apps',
], function () {
    Route::get('/', 'AppController@index')->name('apps.index');
    Route::get('/create', 'AppController@create')->name('apps.create');
    Route::post('/', 'AppController@store')->name('apps.store');
    Route::get('/{app}/edit', 'AppController@edit')->name('apps.edit');
    Route::put('/{app}', 'AppController@update')->name('apps.update');
});