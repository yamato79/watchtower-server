<?php

use Illuminate\Support\Facades\Broadcast;
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

Route::group(['middleware' => ['auth:api']], function() {
    Broadcast::routes();

    // Utility Routes
    Route::get('ping', function() {
        return 'pong';
    });

    Route::match(['GET', 'POST'], 'check', function() {
        return [
            'check' => auth()->check(),
        ];
    });

    // Me
    Route::get('me', [\App\Http\Controllers\MeController::class, 'index'])
        ->name('me');

    // General Resources
    Route::apiResources([
        'channels' => \App\Http\Controllers\ChannelController::class,
        'departments' => \App\Http\Controllers\DepartmentController::class,
        'messages' => \App\Http\Controllers\MessageController::class,
        'organizations' => \App\Http\Controllers\OrganizationController::class,
        'priorities' => \App\Http\Controllers\PriorityController::class,
        'statuses' => \App\Http\Controllers\StatusController::class,
        'services' => \App\Http\Controllers\ServiceController::class,
        'tickets' => \App\Http\Controllers\TicketController::class,
        'users' => \App\Http\Controllers\UserController::class,
    ]);
});
