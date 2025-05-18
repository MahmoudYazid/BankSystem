<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;

//account control
Route::middleware('jwt.auth')->post('/OpenAccount', [AccountController::class, 'OpenAccount']);
Route::delete('/CloseAccount/{id}', [AccountController::class, 'CloseAccount']);
Route::post('/ViewAccountStatus', [AccountController::class, 'ViewAccountStatus']);
Route::post('/FreezeAccount', [AccountController::class, 'FreezeAccount']);
Route::post('/unFreezeAccount', [AccountController::class, 'unFreezeAccount']);
Route::post('/ViewAmountOfMoneyInAccount', [AccountController::class, 'ViewAmountOfMoneyInAccount']);
Route::post('/showAccountData/{id}', [AccountController::class, 'showAccountData']);
Route::post('/ScrollAccount/{page}', [AccountController::class, 'ScrollAccount']);

//user control
Route::post('/RegisterUser', [UserController::class, 'RegisterUser']);
Route::post('/ModifyUser', [UserController::class, 'ModifyUser']);
Route::post('/SignIn', [UserController::class, 'SignIn']);