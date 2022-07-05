<?php
//use App\Http\Controllers\HomeController;
//use App\Http\Controllers\BannersController;

// Route::get('dashboard', function () {
//     return view('backend.admin.home');
// });

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('admin')->group(function () {

    Route::resources([
        'banner'  => App\Http\Controllers\BannerController::class,
        'category'=> App\Http\Controllers\CategoryController::class,
        'product' => App\Http\Controllers\ProductController::class,
    ]);
});