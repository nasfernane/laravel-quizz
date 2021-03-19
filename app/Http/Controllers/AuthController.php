<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller 
{

    public function isLogged () {
        if (session()->get('idUser')) {
            return true;
        } else {
            return redirect ('/login');
        }
    }

    public function logUser (Request $request) {
        $validated = $request->validate([
            'email' => 'required', 
            'password' => 'required']);
    
        [$email, $password] = array($validated["email"], $validated["password"]);
    
        $user = DB::select("SELECT * FROM users WHERE email='{$email}'");
    
        if ($user) {
            $user = $user[0];
    
            // récupération du mot de passe de l'utilisateur enregistré, puis vérification du mot de passe entré
            $userPassword = $user->password;
            $isCorrectPw = password_verify($password, $userPassword);
    
            // si les identifiants sont corrects, crée la session, ajoute son id dans la session, modifie son statut en online dans la bdd puis redirige vers home
            if ($isCorrectPw) {
                $request->session()->put('name', $user->name);
                $request->session()->put('idUser', $user->idUser);
    
                return view('pages/home');
    
            // sinon, redirige vers la page login
            } else {
                return redirect('/login');
                
            }
        // si l'utilisateur n'est pas trouvé, redirige également vers login
        } else {
            return redirect('/login');
        }
    }

    public function logOut (Request $request) {
        $request->session()->forget(['name', 'idUser']);
        return redirect ('/login');
    }

}