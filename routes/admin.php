<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderController;

// Category routes

Route::get('/category/all', [CategoryController::class, 'AllCategory'])->name('all.cat');

Route::post('/category/add', [CategoryController::class, 'addCat'])->name('store.category');

Route::get('category/edit/{id}', [CategoryController::class, 'edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'softDelete']);

Route::get('category/restore/{id}', [CategoryController::class, 'restore']);

Route::get('category/pdelete/{id}', [CategoryController::class, 'Pdelete']);

// Brand routes

Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'storeBrand'])->name('store.brand');

Route::get('brand/edit/{id}', [BrandController::class, 'edit']);

Route::post('brand/update/{id}', [BrandController::class, 'update']);

Route::get('delete/brand/{id}', [BrandController::class, 'delete']);

// MultiMedia

Route::get('all/multi/pic', [BrandController::class, 'all_Multi_Pic'])->name('multi.picture');

Route::post('multi/pic/store', [BrandController::class, 'store_Multi_Pic'])->name('store.multi.pic');

// Slider

Route::get('slider/all', [SliderController::class, 'allSlider'])->name('slider.home');

Route::get('slider/add', [SliderController::class, 'Add'])->name('add.slider');

Route::post('slider/store', [SliderController::class, 'insert'])->name('store.slider');

Route::get('slider/edit/{id}', [SliderController::class, 'edit']);

Route::post('update/slider/{id}', [SliderController::class, 'update']);

Route::get('delete/slider/{id}', [SliderController::class, 'delete']);

// About Us

Route::get('about/all', [AboutController::class, 'about'])->name('about.all');

Route::post('store/about', [AboutController::class, 'add']);

Route::get('about/edit/{id}', [AboutController::class, 'edit']);

Route::post('about/update/{id}', [AboutController::class, 'update']);

Route::get('delete/about/{id}', [AboutController::class, 'delete']);

Route::get('all/portfoli', [AboutController::class, 'portfolio'])->name('portfolio');

// Contact

Route::get('all/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('contact/details', [ContactController::class, 'contactDetails'])->name('contact-details');

Route::post('add/contact', [ContactController::class, 'add']);

Route::get('contact/edit/{id}', [ContactController::class, 'edit']);

Route::get('contact/delete/{id}', [ContactController::class, 'delete']);


// profile process

Route::get('admin/profile', [ContactController::class, 'adminProfile'])->name('admin-profile');

Route::post('profile/update', [ContactController::class, 'updateProfile']);