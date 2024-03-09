<?php

use App\Livewire\KamarList;
use App\Livewire\UserList;
use App\Livewire\TransaksiList;
use App\Http\Controllers\DashboardController;
use App\Livewire\BookingList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kamar', KamarList::class)->name('kamar');
    Route::get('/users', UserList::class)->name('users');
    Route::get('/transaksi', TransaksiList::class)->name('transaksi');
});
