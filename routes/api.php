<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailSenderController;
use App\Http\Controllers\UsersmessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
----------------------------------------------------------------------------
| API POUR AUTHENTIFICATION
----------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});

Route::post('/informations', [UsersmessageController::class, 'store']);


Route::post('/send-email', [MailSenderController::class, 'sendEmail'])->name('send.email');
