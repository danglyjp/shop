<?php

Route::get('/', function () {
    return view('frontend.front-pages.home');
});

Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

Route::get('article', function () {
    return view('frontend.layouts.article');
})->name('article.show');

Route::get('article/detail', function () {
    return view('frontend.layouts.article-detail');
})->name('article.detail');

Route::get('cart', function () {
    return view('frontend.layouts.cart');
})->name('cart.show');

Route::get('login', function () {
    return view('frontend.layouts.create-account');
});

Route::get('track-order', function () {
    return view('frontend.layouts.track-order');
});

Route::get('confirm', function () {
    return view('frontend.layouts.confirm');
});

Route::get('404', function () {
    return view('frontend.layouts.404');
});