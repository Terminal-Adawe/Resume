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
    return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/existing_resume', 'HomeController@existing_resume')->name('existing_resume');

Route::get('/create_cv', 'personaldetailsController@create_cv');

Route::get('/decisive', 'personaldetailsController@decisive')->name('decisive');

Route::get('/personaldetails', 'personaldetailsController@personaldetails');
Route::post('/savepersonaldetails', 'savedetailsController@savepersonaldetails');

Route::get('/education', 'educationController@education');
Route::post('/saveeducation', 'savedetailsController@saveeducationdetails');

Route::get('/professionalexperience', 'professionalexperienceController@professionalexperience');
Route::post('/saveprofesionaldetails', 'savedetailsController@saveprofesionaldetails');

Route::get('/skills', 'skillsController@skills');
Route::post('/saveskill', 'savedetailsController@saveskill');

Route::get('/hobbies', 'hobbiesController@hobbies');
Route::post('/savehobby', 'savedetailsController@savehobby');

Route::get('/summary', 'summaryController@summary');
Route::post('/savesummary', 'savedetailsController@savesummary');

Route::get('/viewtemplates', 'viewResumeController@viewtemplates');

Route::get('/viewresume', 'viewResumeController@viewresume');

Route::get('/previewresume', 'viewResumeController@previewresume');

Route::get('/previewresume2', 'viewResumeController@previewresume2');

Route::post('/print-sheet', 'viewResumeController@printsheet');

Route::get('/export', 'viewResumeController@export')->name('export.pdf');



