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

Route::get('/', 'SiteController@index')->name('home');
Route::get('/about', 'AboutController@about')->name('about');

Route::get('/manufacturing', 'manufacturingController@manufacturing')->name('manufacturing');
Route::get('/research', 'manufacturingController@research')->name('research');

Route::get('products/{serial}', 'productController@product')->name('product');

Route::get('contact', 'ContactController@contact')->name('contact');
Route::post('contact/submit', 'ContactController@submitContactForm')->name('contact.submit'); // 收取聯絡我們表單
Route::get('contact-send', 'ContactController@contactSend')->name('contact-send');
Route::get('privacy', 'ContactController@privacy')->name('privacy');


Route::get('test',function (){
    dd(backendPath('admin'),backendPath('administrator'));
});
