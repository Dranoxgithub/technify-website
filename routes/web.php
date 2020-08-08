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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('pages/index');
});


Route::get('/NGO_project_index', [
    'middleware' => 'auth',
    'uses' => 'ProjectsController@getNGOProjects'
]);
Route::post('/NGO_project_index', [
    'middleware' => 'auth',
    'uses' => 'ProjectsController@store'
]);

Route::get('/projects/{id}','ProjectsController@show')->name('projects.show');
Route::delete('/projects/{id}','ProjectsController@destroy')->name('projects.destroy');
Route::get('/projects/{id}/edit','ProjectsController@edit')->name('projects.edit');

Route::post('/NGO', 'NgosController@store');
Route::post('/NGO/update', 'NgosController@update');
Route::get('/{page}', 'PagesController@show');






