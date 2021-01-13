<?php

Route::get('/', 'HomeController@index')->name('home.direct')->middleware("auth"); 
Route::get('/home', 'HomeController@index')->name('home')->middleware("auth"); 

