<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController; 
use App\Http\Controllers\BranchController; 


Route::get('/', function () {
    return view('welcome');
});
 



    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('companies', CompanyController::class);
        Route::resource('branches', BranchController::class);

    });