<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', function (Request $request) {
    return [
        'status' => true,
        'token' => User::first()->createToken('token-name')->plainTextToken
    ];
});

Route::middleware('auth:sanctum')->group(
    function () {
        Route::post('settings', SettingController::class)->name('settings.store');
        Route::post('settings/bulk', SettingController::class)->name('settings.storeMany');
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    }
);

