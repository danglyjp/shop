<?php

Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'index']);

Route::get('/search', [App\Http\Controllers\frontend\HomeController::class, 'search'])->name('search');
Route::get('lang/{locale}', [App\Http\Controllers\frontend\HomeController::class, 'changeLanguage'])->name('user.change-language');
// Route::group(['middleware' => 'locale'], function() {
// });

// Route::get('search/{search}', function ($search) {
//     return $search;
// })->where('search', '.*');
// Route::get('bug', function () {
//     Debugbar::info();
//     return view('frontend.page.confirm');
// });


Route::prefix('articles')->group(function () {
    Route::get('/', [App\Http\Controllers\frontend\ArticleController::class, 'index'])->name('article');
    Route::get('/{slug}', [App\Http\Controllers\frontend\ArticleController::class, 'show'])->name('article.detail');
});

Route::prefix('products')->group(function () {
    Route::get('/', [App\Http\Controllers\frontend\ProductController::class, 'index'])->name('products');
    //Route::get('?category={cat_slug}', [App\Http\Controllers\frontend\HomeController::class, 'categoryList'])->name('categoryListt');
    Route::get('/{slug}', [App\Http\Controllers\frontend\ProductController::class, 'show'])->name('products.detail');
    Route::get('/tag/{tag}', [App\Http\Controllers\frontend\ProductController::class, 'show'])->name('products.tag');
});

Route::prefix('collections')->group(function () {
    Route::get('/{slug}', [App\Http\Controllers\frontend\CollectionController::class, 'show'])->name('collections');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [App\Http\Controllers\frontend\CartController::class, 'index'])->name('cart.index');
    Route::get('add/{id}', [App\Http\Controllers\frontend\CartController::class, 'addCart'])->name('cart.add');
    Route::delete('delete/{id}', [App\Http\Controllers\frontend\CartController::class, 'destroy'])->name('cart.delete');
});

Route::prefix('account')->group(function () {
    Route::get('login', function () { return view('frontend.page.create-account');})->name('account.login');
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

Route::get('checkout', function () {
    return view('frontend.page.checkout');
})->name('checkout.index');