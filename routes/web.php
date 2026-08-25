<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController; 
use App\Http\Controllers\BranchController; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductCategoryController;


Route::get('/', function () {
    return view('welcome');
});
 



    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('companies', CompanyController::class);
        Route::resource('branches', BranchController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('product-categories',  ProductCategoryController::class);

    });