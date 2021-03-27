<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'Auth\RegisterController@show')->name('register');

Route::get('/NGO_project_index', [
    'middleware' => 'auth',
    'uses' => 'ProjectsController@getNGOProjects'
]);
Route::post('/NGO_project_index', [
    'middleware' => 'auth',
    'uses' => 'ProjectsController@store'
]);
Route::get('/project_listing','ProjectsController@showAllProjects')->name('projects.showAllProjects');
Route::get('/projects/{id}','ProjectsController@show')->name('projects.show');
Route::delete('/projects/{id}','ProjectsController@destroy')->name('projects.destroy');
Route::get('/projects/{id}/edit','ProjectsController@edit')->name('projects.edit');
Route::patch('/projects/{id}','ProjectsController@update')->name('projects.update');

Route::post('/NGO', 'NgosController@store');
Route::get('/NGO/edit', 'NgosController@edit');
Route::patch('/NGO', 'NgosController@update');
Route::get('/NGO', 'NgosController@show');


    
Route::get('/student/edit', 'StudentsController@edit');
Route::post('/student', 'StudentsController@store');
Route::patch('/student', 'StudentsController@update');
Route::get('/getResume', 'StudentsController@getResume');
Route::get('/student', 'StudentsController@show');



Route::post('/projects/{id}','ProjectsController@apply')->name('projects.apply');
Route::get('/student','ProjectsController@temp_apply')->name('projects.temp_apply');

Route::get('/search',['uses' => 'ProjectsController@search','as' => 'search']);

Route::get('/NGO_project_new', 'PagesController@NGO_project_new');
Route::get('/{page}', 'PagesController@show');

