<?php

Route::get('/domains', 'Domain\DomainController@index')->name('domain.index')->middleware("auth"); 
Route::get('/domain/{domain}/ssl/update', 'Domain\DomainController@getUpdateSSL')->name('domain.ssl.update')->middleware("auth"); 
Route::post('/domain/{domain}/ssl/update', 'Domain\DomainController@postUpdateSSL')->name('domain.ssl.update.post')->middleware("auth"); 
Route::get('/domain/{domain}/ssl/auto', 'Domain\DomainController@autoSSL')->name('domain.ssl.auto')->middleware("auth"); 

