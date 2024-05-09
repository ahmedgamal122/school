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
    return view('welcome');
});


Route::get('/s', function () {
    return view('Dashboard.empty');
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::namespace('Dashboard')->group(function () {


    Route::prefix('admin')->group(function() {

 //==============================dashboard============================
    Route::get('/', 'DashboardController@index')->name('dashboard');

      
     //school
     Route::prefix('school')->group(function () {
        Route::get('/create', 'SchoolController@create')->name('school.create');
        Route::post('/store', 'SchoolController@store')->name('school.store');
        Route::get('/edit/{id}', 'SchoolController@edit')->name('school.edit');
        Route::post('/update/{id}', 'SchoolController@update')->name('school.update');
        Route::post('/delete/{id}', 'SchoolController@destroy')->name('school.delete');
        Route::get('/', 'SchoolController@index')->name('school.index');
        Route::get('/trashed', 'SchoolController@trashed')->name('school.trashed');
        Route::post('/restore/{id}', 'SchoolController@restore')->name('school.restore');
    });


     //grades
     Route::prefix('grades')->group(function () {
        Route::get('/create', 'GradesController@create')->name('grades.create');
        Route::post('/store', 'GradesController@store')->name('grades.store');
        Route::get('/edit/{id}', 'GradesController@edit')->name('grades.edit');
        Route::post('/update/{id}', 'GradesController@update')->name('grades.update');
        Route::post('/delete/{id}', 'GradesController@destroy')->name('grades.delete');
        Route::get('/', 'GradesController@index')->name('grades.index');
        Route::get('/trashed', 'GradesController@trashed')->name('grades.trashed');
        Route::post('/restore/{id}', 'GradesController@restore')->name('grades.restore');
    });


     //classes
     Route::prefix('classes')->group(function () {
        Route::get('/create', 'ClassesController@create')->name('classes.create');
        Route::post('/store', 'ClassesController@store')->name('classes.store');
        Route::get('/edit/{id}', 'ClassesController@edit')->name('classes.edit');
        Route::post('/update/{id}', 'ClassesController@update')->name('classes.update');
        Route::post('/delete/{id}', 'ClassesController@destroy')->name('classes.delete');
        Route::get('/', 'ClassesController@index')->name('classes.index');
        Route::get('/trashed', 'ClassesController@trashed')->name('classes.trashed');
        Route::post('/restore/{id}', 'ClassesController@restore')->name('classes.restore');
    });
   

     

    //Gender
    Route::prefix('gender')->group(function () {
        Route::get('/create', 'GenderController@create')->name('gender.create');
        Route::post('/store', 'GenderController@store')->name('gender.store');
        Route::get('/edit/{id}', 'GenderController@edit')->name('gender.edit');
        Route::post('/update/{id}', 'GenderController@update')->name('gender.update');
        Route::post('/delete/{id}', 'GenderController@destroy')->name('gender.delete');
        Route::get('/index', 'GenderController@index')->name('gender.index');
        Route::get('/trashed', 'GenderController@trashed')->name('gender.trashed');
        Route::post('/restore/{id}', 'GenderController@restore')->name('gender.restore');
    });

    //Governorate
    Route::prefix('governorates')->group(function () {
        Route::get('/create', 'GovrnrateController@create')->name('governorates.create');
        Route::post('/store', 'GovrnrateController@store')->name('governorates.store');
        Route::get('/edit/{id}', 'GovrnrateController@edit')->name('governorates.edit');
        Route::post('/update/{id}', 'GovrnrateController@update')->name('governorates.update');
        Route::post('/delete/{id}', 'GovrnrateController@destroy')->name('governorates.delete');
        Route::get('/index', 'GovrnrateController@index')->name('governorates.index');
        Route::get('/trashed', 'GovrnrateController@trashed')->name('governorates.trashed');
        Route::post('/restore/{id}', 'GovrnrateController@restore')->name('governorates.restore');
    });

    //Nationality
    Route::prefix('nationalities')->group(function () {
        Route::get('/create', 'NationalityController@create')->name('nationalities.create');
        Route::post('/store', 'NationalityController@store')->name('nationalities.store');
        Route::get('/edit/{id}', 'NationalityController@edit')->name('nationalities.edit');
        Route::post('/update/{id}', 'NationalityController@update')->name('nationalities.update');
        Route::post('/delete/{id}', 'NationalityController@destroy')->name('nationalities.delete');
        Route::get('/index', 'NationalityController@index')->name('nationalities.index');
        Route::get('/trashed', 'NationalityController@trashed')->name('nationalities.trashed');
        Route::post('/restore/{id}', 'NationalityController@restore')->name('nationalities.restore');
    });


     //Specilization
     Route::prefix('Specilization')->group(function () {
        Route::get('/create', 'SpecilizationController@create')->name('Specilization.create');
        Route::post('/store', 'SpecilizationController@store')->name('Specilization.store');
        Route::get('/edit/{id}', 'SpecilizationController@edit')->name('Specilization.edit');
        Route::post('/update/{id}', 'SpecilizationController@update')->name('Specilization.update');
        Route::post('/delete/{id}', 'SpecilizationController@destroy')->name('Specilization.delete');
        Route::get('/index', 'SpecilizationController@index')->name('Specilization.index');
        Route::get('/trashed', 'SpecilizationController@trashed')->name('Specilization.trashed');
        Route::post('/restore/{id}', 'SpecilizationController@restore')->name('Specilization.restore');
    });



     //Teachers
     Route::prefix('teachers')->group(function () {
        Route::get('/create', 'TeacherController@create')->name('teachers.create');
        Route::post('/store', 'TeacherController@store')->name('teachers.store');
        Route::get('/edit/{id}', 'TeacherController@edit')->name('teachers.edit');
        Route::post('/update/{id}', 'TeacherController@update')->name('teachers.update');
        Route::post('/delete/{id}', 'TeacherController@destroy')->name('teachers.delete');
        Route::get('/index', 'TeacherController@index')->name('teachers.index');
        Route::get('/trashed', 'TeacherController@trashed')->name('teachers.trashed');
        Route::post('/restore/{id}', 'TeacherController@restore')->name('teachers.restore');
    });




    
 
    });

    

});







});