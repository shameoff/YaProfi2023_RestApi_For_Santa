<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ParticipantController;
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


Route::post('/group', [GroupController::class, 'createGroup']);
Route::get('/groups', [GroupController::class, 'getGroups']);
Route::get('/group/{id}', [GroupController::class, 'getGroup']);
Route::put('/group/{id}', [GroupController::class, 'editGroup']);
Route::delete('/group/{id}', [GroupController::class, 'deleteGroup']);
Route::post('/group/{id}/toss', [GroupController::class, 'makeToss']);

Route::post('/group/{id}/participant', [ParticipantController::class, 'createParticipant']);
Route::delete('/group/{groupId}/participant/{participantId}', [ParticipantController::class, 'deleteParticipant']);
Route::get('/group/{groupId}/participant/{participantId}/recipient', [ParticipantController::class, 'getRecipient']);




