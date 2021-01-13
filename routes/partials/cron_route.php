<?php

Route::get('/crons', 'Cron\CronController@index')->name('cron.index')->middleware("auth"); 
Route::post('/crons/on', 'Cron\CronController@postTurnOn')->name('cron.turn.on')->middleware("auth"); 
Route::post('/crons/off', 'Cron\CronController@postTurnOff')->name('cron.turn.off')->middleware("auth"); 

