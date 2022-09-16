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
use App\Http\Controllers\QuizChallengeController;
use App\Http\Controllers\CountryCityController;
use App\Http\Controllers\AuthController;



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
Route::prefix('v1')->group(function () {

    // isGamerExist
    Route::get('isGamer/exist/{id}',[GamerController::class,'isUserExist']);
    
    Route::apiResources([
        'countrystates' => CountryCityController::class,
    ]);

    Route::post('user/auth',[AuthController::class,'doLogin']);

    Route::prefix('user')->group(function () {
        Route::post('registration',[GamerController::class,'store']);
    });

    Route::apiResources([
        'game/user' => GamerController::class,
    ]);

    // question route
    Route::apiResources([
        'question' => QuestionController::class,
    ]);
    
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

        
    
        // schedule route
        Route::apiResources([
            'schedule' => ScheduleController::class,
        ]);
       
    
        // team route
        Route::apiResources([
            'team' => TeamController::class,
        ]); 

        // team route
        Route::apiResources([
            'quiz-challenge' => QuizChallengeController::class,
        ]);
        
        // event with schedules
        Route::get('eventwithschedules',[EventController::class,'eventwithschedule']);

        // event with specific schedules
        Route::get('event/schedule/{id}',[EventController::class,'EventSchedule']);

        // event teams
        Route::get('event/teams/{id}',[EventController::class,'EventTeam']);

        // update team logi
        Route::post('upload/team/logo/{id}',[TeamController::class,'uploadicon']);

        // team with player
        Route::get('teams/players',[TeamController::class,'TeamWithPlayer']);
         
});



});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });http://127.0.0.1:8000/
Route::fallback(function(){
    return response()->json([
        'message' => 'Route Not Found. If error persists, contact info@website.com'], 404);
});