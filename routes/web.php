<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::post('/createuser', function (Request $request) {
    $validated = $request->validate([
        'user' => 'required', 
        'email' => 'required', 
        'password' => 'required', 
        'passwordconfirm' => 'required']);

    [$name, $email, $password, $passwordConfirm] = array($validated["user"], $validated["email"], $validated["password"], $validated["passwordconfirm"]);

    // return view('home', ['email' => $email, 'name' => $name]);

    if ($password === $passwordConfirm) {
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);
        DB::insert("INSERT INTO users (email, name, password) VALUES (:email, :name, :password)", ["email" => $email, "name" => $name, "password" => $encryptedPassword]);

        return redirect('/login');

    } else {
        return redirect('/signup');
    }

});

Route::post('/loguser', function (Request $request) {
    $validated = $request->validate([
        'email' => 'required', 
        'password' => 'required']);

    [$email, $password] = array($validated["email"], $validated["password"]);

    $user = DB::select("SELECT * FROM users WHERE email='{$email}'");
    
    // return view('/home', ['user' => $user]);

    if ($user) {
        $user = $user[0];

        // récupération du mot de passe de l'utilisateur enregistré, puis vérification du mot de passe entré
        $userPassword = $user->password;
        $isCorrectPw = password_verify($password, $userPassword);

        // si les identifiants sont corrects, crée la session, ajoute son id dans la session, modifie son statut en online dans la bdd puis redirige vers home
        if ($isCorrectPw) {
            // $_SESSION['userid'] = $userId;
            // $_SESSION['userName'] = $user[0]['name'];

            return view('home', ['user' => $user]);

        // sinon, redirige vers la page login
        } else {
            return redirect('/login');
            
        }
    // si l'utilisateur n'est pas trouvé, redirige également vers login
    } else {
        return redirect('/login');
    }

    

});
