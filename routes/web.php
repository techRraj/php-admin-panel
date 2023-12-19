<?php

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
// routes/web.php

Route::get('/raj', function () {
    return view('raj');
});

Route::get('/basicroute', function () {
    return "its basic route";
});



Route::get('/', 'Admin\HomeController@index');

Route::get('/admin', 'Admin\HomeController@index')->name('admin');

Route::get('/test', function () {
    return view('homepage');
})->name('home');

Auth::routes();

/*Admin Routes*/
Route::prefix('admin')->group(function() {
    Route::get('/login/', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/register', 'Auth\RegisterController@showAdminRegisterForm');

    Route::post('/login', 'Auth\LoginController@adminLogin');
    Route::post('/register', 'Auth\RegisterController@createAdmin');

    /*Admin Users Route*/
    Route::get('/users', 'Admin\UserController@index')->name('admin.users');
    Route::get('/get-users', 'Admin\UserController@getUsersData')->name('admin.get_users');
    Route::get('/delete-user/{id}', 'Admin\UserController@destroy')->name('admin.delete_user');
    Route::get('/create-user', 'Admin\UserController@create')->name('admin.create-user');
    Route::post('/store-user', 'Admin\UserController@store')->name('admin.store-user');
    Route::get('/edit-user/{id?}', 'Admin\UserController@edit')->name('admin.edit-user');
    Route::post('/update-user', 'Admin\UserController@update')->name('admin.update-user');


    /*Admin Genres Route*/
    Route::get('/genres', 'Admin\GenreController@index')->name('admin.genres');
    Route::get('/get-genres', 'Admin\GenreController@getGenresData')->name('admin.get_genres');
    Route::get('/delete-genre/{id}', 'Admin\GenreController@destroy')->name('admin.delete_genre');
    Route::get('/create-genre', 'Admin\GenreController@create')->name('admin.create-genre');
    Route::post('/store-genre', 'Admin\GenreController@store')->name('admin.store-genre');
    Route::get('/edit-genre/{id?}', 'Admin\GenreController@edit')->name('admin.edit-genre');
    Route::post('/update-genre', 'Admin\GenreController@update')->name('admin.update-genre');

    /*Admin Country Route*/
    Route::get('/countries', 'Admin\CountryController@index')->name('admin.countries');
    Route::get('/get-countries', 'Admin\CountryController@getCountriesData')->name('admin.get_countries');
    Route::get('/delete-country/{id}', 'Admin\CountryController@destroy')->name('admin.delete_country');
    Route::get('/create-country', 'Admin\CountryController@create')->name('admin.create-country');
    Route::post('/store-country', 'Admin\CountryController@store')->name('admin.store-country');
    Route::get('/edit-country/{id?}', 'Admin\CountryController@edit')->name('admin.edit-country');
    Route::post('/update-country', 'Admin\CountryController@update')->name('admin.update-country');


                 // ===================== Raj ADMIN COUNTRY PAGE =====================//
                                     /*Admin Country Route*/
Route::get('/countries1', 'Admin\CountryController2@index')->name('admin.countries1');
Route::get('/get-countries1', 'Admin\CountryController2@getCountriesData')->name('admin.get_countries');
Route::get('/delete-country1/{id}', 'Admin\CountryController2@destroy')->name('admin.delete_country');
Route::get('/create-country1', 'Admin\CountryController2@create')->name('admin.create-country');
Route::post('/store-country1', 'Admin\CountryController2@store')->name('admin.store-country1');
Route::get('/edit-country1/{id?}', 'Admin\CountryController2@edit')->name('admin.edit-country1 ');
Route::post('/update-country1', 'Admin\CountryController2@update')->name('admin.update-country1');
//====================================================================================================//



    /*Admin State Route*/
    Route::get('/states', 'Admin\StateController@index')->name('admin.states');
    Route::get('/get-states', 'Admin\StateController@getStatesData')->name('admin.get_states');
    Route::get('/delete-state/{id}', 'Admin\StateController@destroy')->name('admin.delete_state');
    Route::get('/create-state', 'Admin\StateController@create')->name('admin.create-state');
    Route::post('/store-state', 'Admin\StateController@store')->name('admin.store-state');
    Route::get('/edit-state/{id?}', 'Admin\StateController@edit')->name('admin.edit-state');
    Route::post('/update-state', 'Admin\StateController@update')->name('admin.update-state');

// =======================================================================================//
                    /*Admin State Route*/
//////////////////////////////////////////////////////////////////////////////////////////// 
Route::get('/states2', 'Admin\StateController2@index')->name('admin.states');
Route::get('/get-states2', 'Admin\StateController2@getStatesData')->name('admin.get_states');
Route::get('/delete-state2/{id}', 'Admin\StateController2@destroy')->name('admin.delete_state');
Route::get('/create-state2', 'Admin\StateController2@create')->name('admin.create-state');
Route::post('/store-state2', 'Admin\StateController2@store')->name('admin.store-state2');
Route::get('/edit-state2/{id?}', 'Admin\StateController2@edit')->name('admin.edit-state');
Route::post('/update-state2', 'Admin\StateController2@update')->name('admin.update-state');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ===========================================================================================================//

                    /*Admin Banks Route*/
//////////////////////////////////////////////////////////////////////////////////////////// 
Route::get('/banks', 'Admin\BankController2@index')->name('admin.banks');
Route::get('/get-banks2', 'Admin\BankController2@getBanksData')->name('admin.get_banks');
Route::get('/delete-banks2/{id}', 'Admin\BankController2@destroy')->name('admin.delete_bank');
Route::get('/create-banks2', 'Admin\BankController2@create')->name('admin.create-bank');
Route::post('/store-banks2', 'Admin\BankController2@store')->name('admin.store-banks2');
Route::get('/edit-banks2/{id?}', 'Admin\BankController2@edit')->name('admin.edit-banks2');
Route::post('/update-bank', 'Admin\BankController2@update')->name('admin.update-bank');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ===========================================================================================================//


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////1
                                          /*Admin city Route*/
 Route::get('/cities', 'Admin\CityController@index')->name('admin.cities');
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////1
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////1

    /*Admin Suggestion Route*/
    Route::get('/suggestions', 'Admin\SuggestionController@index')->name('admin.suggestions');
    Route::get('/get-suggestions', 'Admin\SuggestionController@getSuggestionData')->name('admin.get_suggestions');
    Route::get('/show-suggestion/{id}/', 'Admin\SuggestionController@show')->name('admin.show-suggestion');
    Route::get('/mark-as-read/{id}/{status}', 'Admin\SuggestionController@markAsRead')->name('admin.mark-as-read');

    /*Admin Pages Route*/
    Route::get('/pages', 'Admin\StaticPageController@index')->name('admin.pages');
    Route::get('/get-pages', 'Admin\StaticPageController@getPagesData')->name('admin.get_pages');
    Route::get('/delete-page/{id}', 'Admin\StaticPageController@destroy')->name('admin.delete_page');
    Route::get('/create-page', 'Admin\StaticPageController@create')->name('admin.create-page');
    Route::post('/store-page', 'Admin\StaticPageController@store')->name('admin.store-page');
    Route::get('/edit-page/{id?}', 'Admin\StaticPageController@edit')->name('admin.edit-page');
    Route::get('/show-page/{id?}', 'Admin\StaticPageController@show')->name('admin.show-page');
    Route::post('/update-page', 'Admin\StaticPageController@update')->name('admin.update-page');

    Route::get('/dashboard', 'Admin\HomeController@index')->name('admin.dashboard');
    Route::get('/profile/', 'Admin\HomeController@profile')->name('admin.profile');
    Route::post('/update-profile/', 'Admin\HomeController@updateProfile')->name('admin.update-profile');
    Route::get('/change-password/', 'Admin\HomeController@changePassword')->name('admin.change-password');
    Route::post('/update-admin-password/', 'Admin\HomeController@updatePassword')->name('admin.update-password');

    Route::get('/configuration/', 'Admin\ConfigurationController@configuration')->name('admin.configuration');
    Route::post('/update-configuration/', 'Admin\ConfigurationController@updateConfiguration')->name('admin.update.configuration');

});

/*Image Upload Routes*/
Route::get('/drop-zone', 'DropzoneFileUploadController@index')->name('drop-zone');
Route::post('store-image-drop', 'DropzoneFileUploadController@uploadImages');
Route::post('delete-image-drop', 'DropzoneFileUploadController@deleteImage');

/*//Social Login Using Google Routes
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

//Social Login Using Facebook Routes
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');
*/
