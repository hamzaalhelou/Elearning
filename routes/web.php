<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\InstructorsController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\SiteController;

Route::prefix('admin')->name('admin.')->middleware('auth','checktype')->group(function(){
Route::get('/',[AdminController::class,'index'])->name('index');
Route::resource('categories', CategoryController::class);
Route::resource('courses',CourseController::class);
Route::resource('instructors',InstructorsController::class);
Route::resource('features',FeaturesController::class);
Route::resource('testimonials',TestimonialsController::class);});
Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/about', [SiteController::class, 'about'])->name('site.about');
Route::get('/courses', [SiteController::class, 'courses'])->name('site.courses');
Route::get('/courses/{id}', [SiteController::class, 'course'])->name('site.course');
Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
