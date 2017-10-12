<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//pages routes
Route::get('/','PagesController@getIndex');
Route::get('about','PagesController@getAbout');
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle']);

//post routes
Route::resource('posts','PostController');

//user authentication routes
Route::get('auth/login',["as"=>"login","uses"=>"Auth\LoginController@getLogin"]);
Route::post('auth/login','Auth\LoginController@login');
Route::get('auth/logout',["as"=>"logout","uses"=>"Auth\LoginController@logout"]);

//user register routes
Route::get('auth/register','Auth\RegisterController@showRegistrationForm');
Route::post('auth/register','Auth\RegisterController@register');

//password reset routes
Route::get('password/email','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
Route::post('password/reset','Auth\ResetPasswordController@reset');

//category routes
Route::resource('categories','CategoryController');

//tag routes
Route::resource('tags','TagController');

//comment routes
Route::post('comments/{post_id}',["as"=>"comments.store","uses"=>"CommentController@store"]);



Route::get('/test', 'CategoryController@test');
Route::get('/test/name/{name}','DemoController@post');
Route::get('/address', function () {
    return view('address');
});

//events
Route::get('events',["as"=>"events.get","uses"=>"EventController@getevents"]);
Route::post('events',["as"=>"events.post","uses"=>"EventController@postevents"]);

//analytics
Route::get('analytics',["as"=>"analytics.get","uses"=>"AnalyticsController@analytics"]);

Route::post('/post', 'DemoController@post');