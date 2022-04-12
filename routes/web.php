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
Route::get('/register', 'Auth\RegisterController@show')->name('register');
// redirect after verifying
Route::get('/verified', function () {
    if (Auth::user()->type == 'student') {
        return redirect('/student');
    } 
    return redirect('/NGO');
})->middleware('auth');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects/create', [
    'middleware' => 'auth',
    'uses' => 'ProjectsController@create'
]);
Route::post('/projects/create', [
    'middleware' => 'auth',
    'uses' => 'ProjectsController@store'
]);
Route::get('/available_projects','ProjectsController@showAllAvailableProjects')->name('projects.showAllAvailableProjects');
Route::get('/past_projects','ProjectsController@showAllPastProjects')->name('projects.showAllPastProjects');
Route::get('/project_listing','ProjectsController@showProjectListing')->name('projects.showAllProjects');
Route::get('/projects/{id}','ProjectsController@show')->name('projects.show');
Route::delete('/projects/{id}','ProjectsController@destroy')->name('projects.destroy');
Route::get('/projects/{id}/edit','ProjectsController@edit')->name('projects.edit');
// Route::get('/projects/{id}/toggleStatus','ProjectsController@toggleStatus')->name('projects.toggleStatus');
Route::patch('/projects/{id}','ProjectsController@update')->name('projects.update');
Route::post('/projects/upload_image_buffer','ProjectsController@uploadImageToS3Buffer')->name('projects.uploadImageBuffer');

Route::post('/NGO', 'NgosController@store');
Route::get('/NGO/edit', 'NgosController@edit');
Route::patch('/NGO', 'NgosController@update');
Route::get('/NGO', 'NgosController@show');

Route::get('/student/edit', 'StudentsController@edit');
Route::post('/student', 'StudentsController@store');
Route::patch('/student', 'StudentsController@update');
Route::get('/getResume', 'StudentsController@getResume');
Route::get('/student', 'StudentsController@show');
Route::get('/student/select_project', 'StudentsController@showProjectSelection');


Route::post('/projects/{id}','ProjectsController@apply')->name('projects.apply');
Route::post('/temp_apply','StudentsController@temp_apply')->name('projects.temp_apply');

Route::get('/search',['uses' => 'ProjectsController@search','as' => 'search']);

Route::get('/NGO_project_new', 'PagesController@NGO_project_new');
Route::get('/{page}', 'PagesController@show');

Route::get('/admin/NGO', 'AdminsController@test');
Route::get('/admin/students', 'AdminsController@showStudents');
Route::get('/admin/students_json', 'AdminsController@getStudentsJSON');
Route::get('/admin/view_student_resume', 'AdminsController@getStudentsResume');
Route::get('/admin/blog_create', 'AdminsController@createBlog');
Route::get('/admin/blog_edit/{id}', 'AdminsController@editBlog')->name('admin.blog_edit');
Route::get('/admin/blogs', 'AdminsController@indexBlog');
Route::get('/admin/blogs/{id}', 'AdminsController@showBlog')->name('admin.blog_show');
Route::patch('/admin/blog_edit/{id}','AdminsController@updateBlog')->name('admin.blog_update');
Route::post('/admin/blog_create', 'BlogsController@store');
Route::delete('/admin/blogs/{id}','BlogsController@destroy')->name('blogs.destroy');