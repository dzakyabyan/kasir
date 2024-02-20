<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home',function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'admin']);
    // ->middleware('userAkses:admin')
    Route::get('/kasir', [AdminController::class, 'kasir']);
    // ->middleware('userAkses:kasir')
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::group(['middleware' => ['auth']], function(){

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);

});

// Route::group(['middleware' => ['auth', 'userAkses:admin,kasir']], function(){
//     Route::get('/home',[HomeController::class, 'index']);
// });
// Route::get('/', [HomeController::class, 'index']);