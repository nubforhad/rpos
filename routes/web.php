<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CompanyController; 


Route::get('/', function () {
    return view('welcome');
});
 



    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('companies', CompanyController::class);

    });