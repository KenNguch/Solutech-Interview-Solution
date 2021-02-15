<?php


use App\Http\Controllers\Apis\DocumentController;
use App\Http\Controllers\Apis\OrderController;
use App\Http\Controllers\Apis\OrderDetailsController;
use App\Http\Controllers\Apis\ProductsController;
use App\Http\Controllers\Apis\SupplierController;
use App\Http\Controllers\Apis\SupplierProductsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\SMS\BulkSmsController;
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

//Routes with Authentication

Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signup']);
Route::get('signup/activate/{token}', [AuthController::class, 'signupActivate']);

Route::group([
    'prefix' => 'password'
], function () {
    Route::post('create', [PasswordResetController::class, 'create']);
    Route::get('find/{token}', [PasswordResetController::class, 'find']);
    Route::post('passwordReset', [PasswordResetController::class, 'reset']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);

        //Routes with Authentication

        Route::apiResources([

            '/orders' => OrderController::class,
            '/orderDetails' => OrderDetailsController::class,
            '/products' => ProductsController::class,
            '/suppliers' => SupplierController::class,
            '/suppliersProduct' => SupplierProductsController::class,


        ]);
    });
});

//Testing
Route::post('/sendSMS', [BulkSmsController::class, 'sendSms']);
Route::post('/storeFile', [DocumentController::class, 'store']);

Route::apiResources([

    '/orders' => OrderController::class,
    '/orderDetails' => OrderDetailsController::class,
    '/products' => ProductsController::class,
    '/suppliers' => SupplierController::class,
    '/suppliersProduct' => SupplierProductsController::class,


]);
