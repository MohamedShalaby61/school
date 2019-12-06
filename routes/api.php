<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','UserController@login');
Route::post('/register','UserController@register');
Route::get('/getMainCategories','CategoriesController@getMainCategories');
Route::get('/getSubCategoryCourses','CategoriesController@getSubCategoryCourses');
Route::get('/getCourse','CategoriesController@getCourse');
Route::get('/searchCourse','CategoriesController@searchCourse');
Route::post('/insertCourse','CategoriesController@insertCourse');
Route::get('/getFavouriteCourses','CategoriesController@getFavouriteCourses');
Route::get('/getSubCategory','CategoriesController@getSubCategory');
Route::get('/updateFavourite','CategoriesController@updateFavourite');