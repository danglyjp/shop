<?php
//use App\Http\Controllers\HomeController;
//use App\Http\Controllers\BannersController;

// Route::get('dashboard', function () {
//     return view('backend.admin.home');
// });
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
});
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/media', [App\Http\Controllers\FileManagerController::class, 'index']);
    Route::resources([
        // 'slider'  => App\Http\Controllers\SliderController::class,
        'banner'  => App\Http\Controllers\BannerController::class,
        'category'=> App\Http\Controllers\CategoryController::class,
        'article'=> App\Http\Controllers\ArticleController::class,
        'product' => App\Http\Controllers\ProductController::class,
        'setting' => App\Http\Controllers\SettingController::class,
    ]);
});