<?php
//use App\Http\Controllers\HomeController;
//use App\Http\Controllers\BannersController;

// Route::get('dashboard', function () {
//     return view('backend.admin.home');
// });
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
});
Route::get('admin/login', [App\Http\Controllers\LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\LoginController::class, 'postLogin'])->name('admin.postLogin');
Route::get('admin/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('media', [App\Http\Controllers\FileManagerController::class, 'index']);
    Route::post('category/restore/{category}', [\App\Http\Controllers\CategoryController::class, 'restore'])->name('category.restore');
    Route::post('product/restore/{category}', [\App\Http\Controllers\ProductController::class, 'restore'])->name('product.restore');
    Route::resources([
        // 'slider'  => App\Http\Controllers\SliderController::class,
        'banner'  => App\Http\Controllers\BannerController::class,
        'category'=> App\Http\Controllers\CategoryController::class,
        'article'=> App\Http\Controllers\ArticleController::class,
        'user'=> App\Http\Controllers\UserController::class,
        'product' => App\Http\Controllers\ProductController::class,
        'setting' => App\Http\Controllers\SettingController::class,
        'role' => App\Http\Controllers\RoleController::class,
    ]);
});