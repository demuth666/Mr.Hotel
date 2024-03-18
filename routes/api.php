<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\KamarController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\TransaksiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Auth
Route::post('sign-up', [AuthController::class, 'signUp']);
Route::post('sign-in', [AuthController::class, 'signIn']);

Route::group(['middleware' => ['auth:sanctum', 'ability:user']], function () {

    //User
    Route::get('user', [UserController::class, 'user']);
    
    //Kamar
    Route::get('kamar', [KamarController::class, 'kamar']);
    Route::get('show-kamar/{id}', [KamarController::class, 'show']);
    Route::get('filter-kamar/{kelas_kamar}', [KamarController::class, 'filter']);

    //Transaksi
    Route::post('create-transaksi', [TransaksiController::class, 'create']);
    Route::get('transaksi', [TransaksiController::class, 'transaksi']);

    //Auth
    Route::post('sign-out/{tokenId}', [AuthController::class, 'signOut']);
});