<?php

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

Route::get('article', function () {
    return view('frontend.page.article');
})->name('article.show');

Route::get('article/detail', function () {
    return view('frontend.page.article-detail');
})->name('article.detail');

Route::get('cart', function () {
    return view('frontend.page.cart');
})->name('cart.show');

Route::get('login', function () {
    return view('frontend.page.create-account');
});

Route::get('track-order', function () {
    return view('frontend.page.track-order');
});

Route::get('confirm', function () {
    return view('frontend.page.confirm');
});

Route::get('404', function () {
    return view('frontend.page.404');
});