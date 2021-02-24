<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Landlord\LandlordController;
use App\Http\Controllers\Property\PropertyController;
use App\Http\Controllers\Rent\RentController;
use App\Http\Controllers\Tenant\TenantController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('tenants', TenantController::class)->only('index', 'show');

Route::resource('categorys', CategoryController::class)->only('create', 'edit');

Route::resource('propertys', PropertyController::class)->only('index', 'show');

Route::resource('landlords', LandlordController::class)->only('index', 'show');

Route::resource('rents', RentController::class)->only('index', 'show');

Route::resource('users', UserController::class)->except('create', 'edit');
