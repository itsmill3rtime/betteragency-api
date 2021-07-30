<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactPhoneNumberController;
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

Route::middleware('auth:api')->group(function () {

    Route::apiResource('contacts', ContactController::class)->parameters([
        'contacts' => 'contact',
    ]);

    Route::apiResource('contacts.phone_numbers', ContactPhoneNumberController::class)->parameters([
        'phone_numbers' => 'contactPhoneNumber',
    ]);

});
