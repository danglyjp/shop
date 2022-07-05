<?php

Route::get('/', function () {
    return view('frontend.layouts.home');
});

Route::get('/blog', function () {
    return view('frontend.layouts.blog')->name('blog');
});
Route::get('/blog/detail', function () {
    return view('frontend.layouts.blog-detail');
});