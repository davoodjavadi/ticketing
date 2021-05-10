<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
*/
/*
Route::get('/', function () {
    return redirect('/documentation');
});
*/
//Route::redirect('/', 'api/documentation');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'getAuthUser']);
    Route::get('tickets',[TicketsController::class,'index']);
    Route::get('create',[TicketsController::class,'create']);
    Route::post('store',[TicketsController::class,'store']);
    Route::get('ticket/{id}',[TicketsController::class,'show']);
    Route::post('close/{id}',[TicketsController::class,'close']);
    Route::post('comment/store',[CommentsController::class,'store']);
});

Route::get('users',[HomeController::class,'index'])->middleware('admin');

Route::get('/app-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared.';
});
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Config cache cleared.';
});
Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return 'Routes cache cleared.';
});