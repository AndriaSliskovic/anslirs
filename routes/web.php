<?php

Route::get('test','TestController@index')->name('test');
Route::get('/','HomeController@index')->name('home');
Route::get('agencija','HomeController@agencija')->name('agencija');
Route::get('softver','HomeController@softver')->name('softver');
Route::get('vesti','HomeController@vesti')->name('vesti');
Route::get('about','HomeController@about')->name('about');
Route::get('kontakt','HomeController@kontakt')->name('kontakt');
Route::get("/single/{slug}",'HomeController@single')->name('single');
Route::get('katPostova/{id}','HomeController@katPostova')->name('katPostova');
Route::get('download','HomeController@download')->name('download');
Route::get('download/{id}','HomeController@downloadOblast')->name('downloadOblast');

//Route::get('/login1','Auth\LoginController@loginUsera')->name('login1');
Route::get('/adminHome', 'AdminController@index')->name('adminHome');
Route::resource('user','UserController');
Route::resource('profile', 'ProfilesController');

Route::group(['middleware' => ['admin'],'prefix' => 'admin'], function () {

    Route::resource('settings', 'SettingsController');
    Route::resource('kategorije', 'CategoryController');
    Route::resource('menu','MenuController');
    Route::resource('oblast','OblastController');
    Route::resource('tipovi','TipoviController');
    Route::resource('postovi','PostController');
    Route::resource('section','SectionController');
    Route::resource('sectCat','SectCatController');
    Route::resource('dokumenti','DokumentiController');


//Rute za admine
    Route::get('user/admin/{id}',
        [
            'uses' => 'UserController@admin',
            'as' => 'user.admin'
        ]
    );
    Route::get('user/notAdmin/{id}',
        [
            'uses' => 'UserController@notAdmin',
            'as' => 'user.notAdmin'
        ]
    );

});


Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login1','Auth\LoginController@loginUsera')->name('login1');
Route::get('register1', 'Auth\RegisterController@register1')->name('register1');
Route::get('forgot', 'Auth\ForgotPasswordController@forgot')->name('forgot');