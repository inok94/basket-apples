<?php

Route::get('/', 'HomeController@getHome' )->name('home');
Route::get('/take-apple/{user}', 'ApplesController@grabApple' );
Route::get('/free-apples', 'ApplesController@deleteGrabbedApples' );

