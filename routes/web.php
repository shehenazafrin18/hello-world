<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('/insertForm', function () {
    return view('create');
});
Route::resource('forms', 'FormController');
Route::post('insert', 'FormController@insert');
Route::post('update/{id}', 'FormController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
/* ------google login---------- */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
/* -----linkedin login----------- */
Route::get('linkedin', function () {
    return view('linkedinAuth');
});
Route::get('auth/linkedin', 'Auth\AuthController@redirectToLinkedin');
Route::get('auth/linkedin/callback', 'Auth\AuthController@handleLinkedinCallback');
/* -----------Facebook login------- */
Route::get('facebook', function () {
    return view('facebookAuth');
});
Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');
/* -------github login ------- */
Route::get('auth/github', 'Auth\AuthController@redirectToGithub');
Route::get('auth/github/callback', 'Auth\AuthController@handleGithubCallback');

/* ------------Change Password---------- */
Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
