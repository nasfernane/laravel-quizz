<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LexiconController;
use App\Http\Controllers\QuizzController;

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

// pages protégées
Route::get('/', function() {
    return view ('home');
});

Route::get('/lexicon', function() {
    return view ('lexicon');
});

// pages d'authentification
Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});



// requêtes utilisateurs
Route::post('/createuser', [UserController::class, 'createUser']);

// requetes authentification
Route::post('/loguser', [AuthController::class, 'logUser']);
Route::post('/logout', [AuthController::class, 'logOut']);

// requêtes lexique
Route::post('/addword', [LexiconController::class, 'addword']);

// requête quizz
Route::get('/quizz', [QuizzController::class, 'createQuizz']);
Route::post('/definition', [QuizzController::class, 'getDefinition']);