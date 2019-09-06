<?php

Route::get('/news-update', 'Acme\LaravelApi\Http\Controllers\JobManagerController@news_update')->middleware('web');
