<?php

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\MaterialDonationController;
use App\Http\Controllers\MonetaryDonationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Livewire\Admin\ProductTable;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['role:admin','auth'])->group(function () {


    Route::get('/products-table',ProductTable::class)->name('products-table');
    Route::resource('/products',ProductController::class)->name('index','products');

    Route::post('/uploade',[\App\Http\Controllers\Admin\UploadeController::class,'store'])->name('uploade');


    Route::get("/sitesetting",[SiteSettingController::class,'index'])->name("sitesetting");
    Route::post("/sitesetting",[SiteSettingController::class,'store'])->name("sitesetting.post");

    Route::get('/contact',[ContactController::class,'index'])->name('admin.contacts');
    Route::get('/contact/{contact}',[ContactController::class,'replay'])->name('admin.contacts.replay');
    Route::post('/contact.update/{contact}',[ContactController::class,'update'])->name('admin.contacts.update');




    Route::get('/departments.show',\App\Http\Livewire\Admin\DepartmentTable::class)->name('departments.show');
   Route::post('/departments.store',[\App\Http\Controllers\DepartmentController::class,'store'])->name('departments.store');
    Route::post('/departments.update',[\App\Http\Controllers\DepartmentController::class,'update'])->name('departments.update');

    Route::get('/donor/pdf',[\App\Http\Controllers\DepartmentController::class,'download_pdf'])->name('donor.pdf');
    Route::resource('/depts', App\Http\Controllers\DepartmentController::class)->name('index','depts');

    Route::resource('/offers',OfferController::class)->name('index','offers');
    Route::resource('/monetarydonation',MonetaryDonationController::class)->name('index','monetarydonation');
    Route::resource('/materialdonation',MaterialDonationController::class)->name('index','materialdonation');






});
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('permissions', PermissionsController::class);
    Route::delete('permissions_mass_destroy', [PermissionsController::class,'massDestroy'])->name('permissions.mass_destroy');
    Route::delete('roles_mass_destroy', [RolesController::class,'massDestroy'])->name('roles.mass_destroy');
    Route::resource('roles', RolesController::class);
    Route::delete('users_mass_destroy', [UsersController::class,'massDestroy'])->name('users.mass_destroy');
    Route::get('users_ban/{user}',[UsersController::class,'ban'])->name('users.ban.show');
    Route::post('users_ban/{user}',[UsersController::class,'ban_store'])->name('users.ban.post');

    Route::resource('users', UsersController::class);




});
