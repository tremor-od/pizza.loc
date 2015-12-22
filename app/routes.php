<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('id', '[0-9]+');

Route::group(array('prefix' => 'admin'), function () {

    Route::any('/', array('as' => 'admin', 'uses' => 'AdminController@index'));

    Route::any('/page/{id?}', 'AdminController@page');
    Route::any('/pageAction/{action}/{id?}', 'AdminController@pageAction');

    Route::any('/category/{id?}', 'AdminController@category');
    Route::any('/categoryAction/{action}/{id?}', 'AdminController@categoryAction');

    Route::any('/subcategory/{id?}', 'AdminController@subcategory');
    Route::any('/subcategoryAction/{action}/{id?}', 'AdminController@subcategoryAction');

    Route::any('/product/{id?}', 'AdminController@product');
    Route::any('/productAction/{action}/{id?}', 'AdminController@productAction');

    Route::any('/size/{id?}', 'AdminController@size');
    Route::any('/sizeAction/{action}/{id?}', 'AdminController@sizeAction');

    Route::any('/group/{id?}', 'AdminController@group');
    Route::any('/groupAction/{action}/{id?}', 'AdminController@groupAction');

    Route::any('/slider/{id?}', 'AdminController@slider');
    Route::any('/sliderAction/{action}/{id?}', 'AdminController@sliderAction');

    Route::any('/social/{id?}', 'AdminController@social');
    Route::any('/socialAction/{action}/{id?}', 'AdminController@socialAction');

    Route::any('/setting/{id?}', 'AdminController@setting');
    Route::any('/settingAction/{action}/{id?}', 'AdminController@settingAction');

});

Route::group(array('prefix' => 'auth'), function () {

    Route::any('/login', array('as' => 'login', 'uses' => 'AuthController@login'));
    Route::any('/registration', array('as' => 'registration', 'uses' => 'AuthController@registration'));
    Route::any('/logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

});

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/page/{alias}', array('as' => 'page', 'uses' => 'HomeController@page'));
Route::get('/category/{categoryAlias}/{subcategoryAlias?}', array('as' => 'category', 'uses' => 'HomeController@category'));




