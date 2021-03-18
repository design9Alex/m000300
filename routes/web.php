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

Route::get('contact', 'contactController@contact')->name('contact');
Route::get('contactSend', 'ContactController@contactSend')->name('contactSend');
Route::get('captcha/{name}/{id?}', 'contactController@getCaptcha')->name('contact.captcha'); // 驗證碼
Route::post('contact/submit', 'contactController@submitContactForm')->name('contact.post.submit'); // 收取聯絡我們表單
