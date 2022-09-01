<?php
//use App\Http\Controllers\backend\HomeController;
//use App\Http\Controllers\backend\BannersController;

// Route::get('dashboard', function () {
//     return view('backend.admin.home');
// });
Route::get('/cache', function () {
    $exitCode = Artisan::call('cache:clear');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [App\Http\Controllers\backend\LoginController::class, 'index'])->name('login')->middleware('checklogin.form');
    //Route::get(login', [App\Http\Controllers\backend\LoginController::class, 'index'])->name('login');
    Route::post('login', [App\Http\Controllers\backend\LoginController::class, 'postLogin'])->name('postLogin');
    //Route::get('logout', [App\Http\Controllers\backend\LoginController::class, 'logout'])->name('logout');
    Route::post('logout', [App\Http\Controllers\backend\LoginController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {return redirect()->route('admin.dashboard'); });
    Route::get('dashboard', [App\Http\Controllers\backend\AdminController::class, 'index'])->name('dashboard');
    Route::get('media', [App\Http\Controllers\backend\FileManagerController::class, 'index']);
    Route::post('category/restore/{category}', [\App\Http\Controllers\backend\CategoryController::class, 'restore'])->name('category.restore');
    Route::post('product/restore/{category}', [\App\Http\Controllers\backend\ProductController::class, 'restore'])->name('product.restore');
    Route::resources([
        // 'slider'  => App\Http\Controllers\backend\SliderController::class,
        'banner'  => App\Http\Controllers\backend\BannerController::class,
        'category'=> App\Http\Controllers\backend\CategoryController::class,
        'article'=> App\Http\Controllers\backend\ArticleController::class,
        'user'=> App\Http\Controllers\backend\UserController::class,
        'product' => App\Http\Controllers\backend\ProductController::class,
        'setting' => App\Http\Controllers\backend\SettingController::class,
        'role' => App\Http\Controllers\backend\RoleController::class,
    ]);
});