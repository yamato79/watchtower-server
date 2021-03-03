<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => []], function() {
    Route::apiResources([
        'departments' => \App\Http\Controllers\DepartmentController::class,
        'messages' => \App\Http\Controllers\MessageController::class,
        'priorities' => \App\Http\Controllers\PriorityController::class,
        'statuses' => \App\Http\Controllers\StatusController::class,
        'tickets' => \App\Http\Controllers\TicketController::class,
    ]);
});