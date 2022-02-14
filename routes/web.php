<?php

use App\Http\Controllers\BrandController;
use App\Models\MultiPicModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $sliders = DB::table('sliders')->get();
    $abouts = DB::table('abouts')->first();
    $images = MultiPicModel::all();
    return view('home', compact('brands', 'sliders', 'abouts', 'images'));
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all(); // get ll users attributes  // orm method
    $sliders = DB::table('sliders')->get();
    return view('admin.slider.index', compact('users', 'sliders'));
})->name('dashboard');

Route::get('user/logout', [BrandController::class, 'logout'])->name('userLogout');
