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
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// login route
Route::get('/', function () {
    return view('login');
})->name('login');



Route::get('/logout',function()
   {
    session()->flush();
    Auth::logout();

    return redirect('/');
});

Route::post('/sign-in', [AuthController::class,'doLogin']);

Route::group(['middleware' => ['auth']], function() {
// dashboard routes
Route::prefix('dashboard')->group(function () {
    Route::get('event/schedule',[EventController::class,'eventwithschedule']);
    Route::get('event/schedule/winners/{id}',function()
    {
        return view('Dashboard.winners');
    });
});

// challenge routes
Route::prefix('challenge')->group(function () {
    Route::get('list',[ChallengeController::class,'index'])->name('challenge.list');

    Route::post('store',[ChallengeController::class,'store']);

    Route::get('create',function()
    {
        return view('Challenge.create');
    })->name('challenge.create');

    Route::get('edit/{id}',[ChallengeController::class,'edit']);

    Route::post('update/{id}',[ChallengeController::class,'update']);

    Route::get('delete/{id}',[ChallengeController::class,'destroy']);
});

// events routes
Route::prefix('events')->group(function () {

    Route::get('list',[EventController::class,'index'])->name('events.list');

    Route::get('create',function()
    {
        return view('Event.create');
    })->name('events.create');

    Route::post('store',[EventController::class,'store']);

    Route::get('edit/{id}',[EventController::class,'edit']);

    Route::get('delete/{id}',[EventController::class,'destroy']);

    Route::get('details/{id}',[QuestionController::class,'show']);

    Route::post('update/{id}',[EventController::class,'update']);

    Route::get('questions/{id}',function()
    {
        return view('Event.event-questions');
    });

    Route::get('create-schedule/{id}',function($id)
    {
       
        $teams = App\Models\Team::where('event_id','=',$id)->get();
        return view('Event.createSchedule',compact('id','teams'));
    });

    Route::get('schedule/{id}',[EventController::class,'EventSchedule']);

    Route::post('store/schedule',[ScheduleController::class,'store']);

    Route::get('delete/schedule/{id}',[ScheduleController::class,'destroy']);

    Route::get('teams/{id}',[EventController::class,'EventTeam']);

    Route::get('feature/{id}',function($id)
    {
        $event = App\Models\Event::where('id','=',$id)->first();
        return view('Event.event-details',compact('event'));
    });

    Route::get('edit/{id}',[ScheduleController::class,'show']);

    Route::post('update/schedule/{id}',[ScheduleController::class,'update']);
});

// player routes
Route::prefix('player')->group(function () {

    Route::get('list',[PlayerController::class,'index'])->name('player.list');

    Route::get('create',function()
    {
        $teams = App\Models\Team::all();
        return view('Player.create',compact('teams'));
    })->name('player.create');

    Route::post('store',[PlayerController::class,'store']);

    Route::get('edit/{id}',[PlayerController::class,'edit']);

    Route::post('update/{id}',[PlayerController::class,'update']);

    Route::get('delete/{id}',[PlayerController::class,'destroy']);
});

// Questions routes
Route::prefix('questions')->group(function () {

    Route::get('options/{id}',[QuestionController::class,'getOptions']);
    
    Route::get('list',[QuestionController::class,'index'])->name('questions.list');

    Route::get('create',function()
    {
        return view('Question.create');
    })->name('questions.create');

    Route::post('answer/update',[AnswerController::class,'update']);

    Route::post('store',[QuestionController::class,'store']);

    Route::get('edit/{id}',[QuestionController::class,'edit']);

    Route::post('update',[QuestionController::class,'update']);

    Route::get('delete/{id}',[QuestionController::class,'destroy']);

    Route::post('change/bulk/status-active',[QuestionController::class,'activeBulk']);

    Route::post('change/bulk/status-inactive',[QuestionController::class,'inactiveBulk']);
});

// settings routes
Route::prefix('settings')->group(function () {
    Route::get('profile',function()
    {
        return view('Setting.index');
    })->name('settings.profile');

    Route::post('create',function()
    {
        return view('Setting.create');
    });

    Route::get('change-password',function()
    {
        return view('Setting.change-password');
    });

    Route::get('edit',[UserController::class,'editprofile']);

    Route::post('update-profile',[UserController::class,'updateprofile']);

    Route::post('update-password',[UserController::class,'updatepassword']);

    Route::get('delete-profile',[UserController::class,'deleteprofile']);
    
});

// teams routes
Route::prefix('teams')->group(function () {

    Route::get('list',[TeamController::class,'index'])->name('teams.list');

    Route::get('create/{id}',function($id)
    {
        return view('Team.create',compact('id'));
    })->name('teams.create');

    Route::post('store',[TeamController::class,'store']);

    Route::get('edit/{id}',[TeamController::class,'show']);

    Route::post('update/{id}',[TeamController::class,'update']);
    
    Route::get('delete/{id}',[TeamController::class,'destroy']);
    
});

// users routes
Route::prefix('users')->group(function () {

    Route::get('list',[UserController::class,'index'])->name('users.list');
    Route::post('store',[UserController::class,'store']);

    Route::get('create',function()
    {
        return view('User.create');
    })->name('users.create');

    Route::get('edit/{id}',[UserController::class,'show']);

    Route::get('delete/{id}',[UserController::class,'destroy']);

    Route::post('update/{id}',[UserController::class,'update']);
});

});


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');