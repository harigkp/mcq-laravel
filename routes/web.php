<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CustomAuthController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [ExamController::class, 'index'])->name('index');
Route::get('/test', [ExamController::class, 'test'])->name('test');
Route::post('/submittest', [ExamController::class, 'submittest'])->name('submittest');


Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
