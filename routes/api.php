<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CoinsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PointsCategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPointsController;
use App\Http\Controllers\GamerController;



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

// routes without auth
// users registartion
Route::prefix('v1')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('registration',[GamerController::class,'store']);
    });
});


// routes with auth
Route::group(['middleware'=>['auth:sanctum']],function(){

Route::prefix('v1')->group(function () {
    // gamer route 
        Route::apiResources([
            'game-user' => GamerController::class,
        ]);
    
    // users route
        Route::apiResources([
            'user' => UserController::class,
         ]);

    // challenges route
        Route::apiResources([
            'challenge' => ChallengeController::class,
         ]);

    // answers route
        Route::apiResources([
            'answer' => AnswerController::class,
        ]);
    // coin route
        Route::apiResources([
            'coin' => CoinsController::class,
        ]);
   
    // event route
        Route::apiResources([
            'event' => EventController::class,
        ]);

    // player route
        Route::apiResources([
            'player' => PlayerController::class,
        ]);
    
    // question route
        Route::apiResources([
            'question' => QuestionController::class,
        ]);
    
    // schedule route
        Route::apiResources([
            'schedule' => ScheduleController::class,
        ]);
    
    // team route
        Route::apiResources([
            'team' => TeamController::class,
        ]);
    
});



});

Route::group(['middleware' => 'role:user'], function() {

    Route::get('/user', function() {
 
       return 'Welcome...!!';
       
    });
 
 });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
