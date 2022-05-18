<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Front;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Front::class,'index'])->name('frontpage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin/jobs-all', [Admin::class,'jobs'])->name('adminJobs');
    Route::get('/admin/category-all', [Admin::class,'categories'])->name('adminCategory');
    Route::get('/admin/category-create', [Admin::class,'createCategories'])->name('adminCreateCategory');
    Route::get('/admin/setting', [SettingsController::class,'index'])->name('adminSetting');
    Route::get('/admin/setting/create', [SettingsController::class,'create'])->name('createsetting');
    Route::post('/admin/setting/create', [SettingsController::class,'store'])->name('storesetting');
    Route::post('/admin/setting/{id}/update', [SettingsController::class,'update']);
    // Route::resource('pos/admin/settingts', SettingController::class);

    Route::get('/job/{id}/edit', [PostsController::class,'edit'])->name('editjob');
    Route::post('/job/{id}/update', [PostsController::class,'update']);

    Route::get('/category/{slug}/edit', [CategoriesController::class,'edit'])->name('editcategory');
    Route::post('/category/{slug}/update', [CategoriesController::class,'update']);    
});

  
Route::resource('posts', PostsController::class);
Route::resource('setting', SettingsController::class);
Route::get('/job/{id}', [PostsController::class,'show'])->name('viewjob');
// Route::get('/job/{id}/edit', [PostsController::class,'edit'])->name('editjob');
// Route::post('/job/{id}/update', [PostsController::class,'update']);
Route::resource('category', CategoriesController::class);
Route::get('/category/create', [CategoriesController::class,'create'])->middleware('auth:sanctum')->name('createcategory');
Route::get('/category/{slug}', [CategoriesController::class,'show'])->name('viewCategory');
Route::get('/category', [CategoriesController::class,'index'])->name('Category');