<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LexiconController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/lexicon', function () {
    return view('lexicon');
});


Route::post('/createuser', [UserController::class, 'createUser']);
Route::post('/loguser', [AuthController::class, 'logUser']);
Route::post('/logout', [AuthController::class, 'logOut']);
Route::post('/addword', [LexiconController::class, 'addword']);
