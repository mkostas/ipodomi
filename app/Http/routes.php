<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Schools
Route::get('/', 'SchoolsController@index' );
Route::get('/create', 'SchoolsController@create' );
Route::post('/store', 'SchoolsController@store' );
Route::get('/edit/{id}', 'SchoolsController@edit' );
Route::patch('/edit/{id}', 'SchoolsController@update' );
Route::delete('/delete/{id}', 'SchoolsController@delete' );

// Emails
Route::get('/email', 'EmailController@index');
Route::get('/email/create', 'EmailController@create');
Route::post('/email/store', 'EmailController@store' );
Route::get('/email/{id}', 'EmailController@edit');
Route::patch('/email/{id}', 'EmailController@update');
Route::delete('/email/{id}', 'EmailController@destroy');

// Languages
Route::get('/language', 'LanguageController@index');
Route::get('/language/create', 'LanguageController@create');
Route::post('/language/store', 'LanguageController@store' );
Route::get('/language/{id}', 'LanguageController@edit');
Route::patch('/language/{id}', 'LanguageController@update');
Route::delete('/language/{id}', 'LanguageController@destroy');

// Countris
Route::get('/country', 'CountryController@index');
Route::get('/country/create', 'CountryController@create');
Route::post('/country/store', 'CountryController@store' );
Route::get('/country/{id}', 'CountryController@edit');
Route::patch('/country/{id}', 'CountryController@update');
Route::delete('/country/{id}', 'CountryController@destroy');

// Parts Categories
Route::get('/parts_categories', 'PartsCategoriesController@index');
Route::get('/parts_categories/create', 'PartsCategoriesController@create');
Route::post('/parts_categories/store', 'PartsCategoriesController@store' );
Route::get('/parts_categories/{id}', 'PartsCategoriesController@edit');
Route::patch('/parts_categories/{id}', 'PartsCategoriesController@update');
Route::delete('/parts_categories/{id}', 'PartsCategoriesController@destroy');

// Parts Text
Route::get('/parts_text/{id}', 'PartsTextController@index');
Route::get('/parts_text/show/{id}/{language}', 'PartsTextController@show');
Route::get('/parts_text/create/{id}', 'PartsTextController@create');
Route::post('/parts_text/create/store', 'PartsTextController@store' );
Route::get('/parts_text/edit/{id}', 'PartsTextController@edit');
Route::patch('/parts_text/edit/{id}', 'PartsTextController@update');
Route::delete('/parts_text/{id}', 'PartsTextController@destroy');

// Letters of Intent
Route::get('/letters_of_intent', 'LettersOfIntentController@index');
Route::get('/letters_of_intent/show/{language}', 'LettersOfIntentController@show');
Route::get('/letters_of_intent/create', 'LettersOfIntentController@create');
Route::post('/letters_of_intent/store', 'LettersOfIntentController@store' );
Route::get('/letters_of_intent/{id}', 'LettersOfIntentController@edit');
Route::patch('/letters_of_intent/{id}', 'LettersOfIntentController@update');
Route::delete('/letters_of_intent/{id}', 'LettersOfIntentController@destroy');

// Company Category
Route::get('/company_category', 'CompanyCategoryController@index');
Route::get('/company_category/create', 'CompanyCategoryController@create');
Route::post('/company_category/store', 'CompanyCategoryController@store' );
Route::get('/company_category/{id}', 'CompanyCategoryController@edit');
Route::patch('/company_category/{id}', 'CompanyCategoryController@update');
Route::delete('/company_category/{id}', 'CompanyCategoryController@destroy');

// Company
Route::get('/company', 'CompanyController@index');
Route::get('/company/create', 'CompanyController@create');
Route::post('/company/store', 'CompanyController@store' );
Route::get('/company/{id}', 'CompanyController@edit');
Route::patch('/company/{id}', 'CompanyController@update');
Route::delete('/company/{id}', 'CompanyController@destroy');

// Completed Applications
Route::get('/completed_applications', 'CompletedApplicationsController@index');
Route::get('/completed_applications/show/{language}', 'CompletedApplicationsController@show');
Route::get('/completed_applications/create', 'CompletedApplicationsController@create');
Route::post('/completed_applications/store', 'CompletedApplicationsController@store' );
Route::get('/completed_applications/{id}', 'CompletedApplicationsController@edit');
Route::patch('/completed_applications/{id}', 'CompletedApplicationsController@update');
Route::delete('/completed_applications/{id}', 'CompletedApplicationsController@destroy');

// Instructions
Route::get('/instructions', 'InstructionsController@index');
Route::get('/instructions/show/{language}', 'InstructionsController@show');
Route::get('/instructions/create', 'InstructionsController@create');
Route::post('/instructions/store', 'InstructionsController@store' );
Route::get('/instructions/{id}', 'InstructionsController@edit');
Route::patch('/instructions/{id}', 'InstructionsController@update');
Route::delete('/instructions/{id}', 'InstructionsController@destroy');

// Submitted Applications
Route::get('/submitted_applications', 'SubmittedApplicationsController@index');
Route::get('/submitted_applications/show/{language}', 'SubmittedApplicationsController@show');
Route::get('/submitted_applications/create', 'SubmittedApplicationsController@create');
Route::post('/submitted_applications/store', 'SubmittedApplicationsController@store' );
Route::get('/submitted_applications/{id}', 'SubmittedApplicationsController@edit');
Route::patch('/submitted_applications/{id}', 'SubmittedApplicationsController@update');
Route::delete('/submitted_applications/{id}', 'SubmittedApplicationsController@destroy');

// Program Of Activities
Route::get('/program_of_activities', 'ProgramOfActivitiesController@index');
Route::get('/program_of_activities/show/{language}', 'ProgramOfActivitiesController@show');
Route::get('/program_of_activities/create', 'ProgramOfActivitiesController@create');
Route::post('/program_of_activities/store', 'ProgramOfActivitiesController@store' );
Route::get('/program_of_activities/{id}', 'ProgramOfActivitiesController@edit');
Route::patch('/program_of_activities/{id}', 'ProgramOfActivitiesController@update');
Route::delete('/program_of_activities/{id}', 'ProgramOfActivitiesController@destroy');