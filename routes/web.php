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

Route::get('/', 'HomeController@index')->name('ho');
// Route::get('/rregister','UserController@register')->name('rregister');
Auth::routes();




Route::get('/dishes','DishController@index')->name('dishes.page');
Route::get('/dish','DishController@create')->name('createDish.page')->middleware('admin');
Route::post('/dish','DishController@store')->name('storeDish.page')->middleware('admin');
Route::get('/dishes/{dish}','DishController@show')->name('dish.page');
Route::get('/dishes/{dish}/edit','DishController@edit')->name('editDish.page')->middleware('admin');
Route::put('/dishes/{dish}/update','DishController@update')->name('updateDish.page')->middleware('admin');
Route::delete('/dishes/{dish}','DishController@destroy')->name('deleteDish.page')->middleware('admin');

Route::get('/cart','CartController@index')->name('cart.page');
Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::post('/removeFromCart','CartController@removeFromCart')->name('removeFromCart');
Route::post('/removeDishFromCart','CartController@removeDishFromCart')->name('removeWholeDishFromCart');
Route::get('/cart/clean','CartController@cleanCart')->name('cleanCart');

Route::post('/reservation','ReservationController@store')->name('storeReservation');
Route::get('/reservation/{reservation}','ReservationController@edit')->name('editReservation');
Route::put('/reservation','ReservationController@update')->name('updateReservation');




Route::group(['middleware'=>['admin'],'prefix'=>'admin'],function()
{
  Route::get('/','AdminController@index')->name('admin.page');
  Route::get('/dishes','DishController@adminIndex')->name('adminDishes.page');
  Route::get('/dish/{dish}/edit','DishController@edit')->name('adminDishEdit.page');


  Route::get('/categories','MainController@index')->name('adminCategories.page');
  Route::get('/categories/create','MainController@create')->name('createCategory.page');
  Route::post('/categories/store','MainController@store')->name('storeCategory.page');
  Route::get('/categories/{category}/edit','MainController@edit')->name('categoryEdit.page');
  Route::put('/categories/{category}/update','MainController@update')->name('updateCategory.page');
  Route::delete('/categories/{category}','MainController@destroy')->name('categoryDelete.page');


  Route::get('/users','UserController@index')->name('adminUsers.page');
  Route::get('/users/create','UserController@create')->name('adminUserCreate.page');
  Route::post('/users','UserController@store')->name('adminUserStore.page');
  Route::get('/users/{user}/edit','UserController@edit')->name('adminUserEdit.page');
  Route::put('/users/{user}','UserController@update')->name('adminUserUpdate.page');
  Route::delete('/users/{user}','UserController@destroy')->name('deleteUser.page');

  Route::get('/reservation','ReservationController@index')->name('adminReservation.page');
  Route::get('/reservation/create','ReservationController@create')->name('createReservation.page');
  Route::post('/reservation','ReservationController@store')->name('storeReservation.page');
  Route::get('/reservation/{reservation}/edit','ReservationController@edit')->name('editReservation.page');
  Route::put('/reservation/{reservation}','ReservationController@update')->name('updateReservation.page');
  Route::delete('/reservation/{reservation}','ReservationController@destroy')->name('deleteReservation.page');

});
