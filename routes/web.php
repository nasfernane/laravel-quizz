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
    return view ('pages/home');
})->name('home');

// pages d'authentification
Route::get('/login', function () {
    return view('pages/login');
})->name('login');

Route::post('/login', function () {
    return view('pages/login');
});

Route::get('/signup', function () {
    return view('pages/signup');
})->name('signup');



// requêtes utilisateurs
Route::post('/createuser', [UserController::class, 'createUser'])->name('createUser');

// requetes authentification
Route::post('/loguser', [AuthController::class, 'logUser'])->name('loginUser');
Route::post('/logout', [AuthController::class, 'logOut'])->name('logOutUser');

// requêtes lexique
Route::post('/addword', [LexiconController::class, 'addword']);
Route::get('/lexicon', [LexiconController::class, 'getAllWords']);
Route::post('/deleteword', [LexiconController::class, 'deleteWord']);
// spint 2--mathieu
Route::get('/definitionsList/{id}', [LexiconController::class, 'showDefinitionList']);
Route::get('/addDefinition/{id}/{name}', [LexiconController::class, 'goToAddDefinition']);
Route::post('/addDefinition', [LexiconController::class, 'AddDefinition']);
// spint 2--halima
Route::get('/allDefinitions',[LexiconController::class, 'getAllDefinitionsNotValid']);
Route::post('/validDefinition', [LexiconController::class, 'validate_definition']);
Route::post('/removeValidation', [LexiconController::class, 'remove_validation']);
Route::post('/addComment', [LexiconController::class, 'addComment']);

// requête quizz
Route::get('/quizz', [QuizzController::class, 'createQuizz']);
Route::post('/definition', [QuizzController::class, 'getDefinition']);
// sprint 2--seif
Route::post('/quizz', [QuizzController::class, 'addTerme']);

// requêtes admins
Route::get('/admin', [UserController::class, 'getUsers']);
Route::post('/togglerole', [UserController::class, 'toggleRole']);
Route::post('/deleteuser', [UserController::class, 'deleteUser']);