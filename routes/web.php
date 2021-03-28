<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LexiconController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\AdminController;

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

// =============================
// requête navigation home
// Route::get('/', function() {
//     return view ('pages/home');
// })->name('home');

// pages d'authentification
// Route::get('/login', function () {
//     return view('pages/login');
// })->name('login');

// Route::get('/signup', function () {
//     return view('pages/signup');
// })->name('signup');
// routes allégées avec méthode statique de la class Route : "view"
Route::view('/', 'home.index')->name('home.index');
Route::view('/login', 'home.login')->name('home.login');
Route::view('/signup', 'home.signup')->name('home.signup');
Route::view('/themes', 'admin.themes')->name('admin.themes');

// =============================
// requêtes utilisateurs
Route::post('/createuser', [UserController::class, 'createUser'])->name('createUser');

// =============================
// requetes authentification
Route::post('/loguser', [AuthController::class, 'logUser'])->name('loginUser');
Route::post('/logout', [AuthController::class, 'logOut'])->name('logOutUser');

// =============================
// requêtes lexique
Route::post('/addword', [LexiconController::class, 'addword']);
Route::get('/lexicon', [LexiconController::class, 'getAllWords']);
Route::post('/deleteword', [AdminController::class, 'deleteWord']);
// spint 2--mathieu
Route::get('/definitionsList/{id}', [LexiconController::class, 'showDefinitionList']);

Route::post('/addDefinition', [LexiconController::class, 'AddDefinition']);


// =============================
// requête quizz
Route::get('/quizz', [QuizzController::class, 'createQuizz']);
Route::post('/definition', [QuizzController::class, 'getDefinition']);
// sprint 2--seif
Route::post('/quizz', [QuizzController::class, 'addDefinition']);

// =============================
// requêtes admins
Route::get('/users', [UserController::class, 'getUsers'])->name('admin.users');
Route::post('/togglerole', [UserController::class, 'toggleRole'])->name('admin.roles');
Route::post('/deleteuser', [UserController::class, 'deleteUser'])->name('admin.deleteUser');
// sprint 2 -- halima
Route::get('/validation',[AdminController::class, 'validationList']);
Route::post('/addValidation', [AdminController::class, 'addValidation']);
Route::post('/removeValidation', [AdminController::class, 'removeValidation']);
Route::post('/addComment', [AdminController::class, 'addComment']);