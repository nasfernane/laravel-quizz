<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AuthController extends Controller 
{

    public function logUser (Request $request) {
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
    }

}