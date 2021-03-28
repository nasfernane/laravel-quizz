<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller 
{

    // création d'un nouvel utilisateur 
    public function createUser(Request $request) {
        $validated = $request->validate([
            'user' => 'required', 
            'email' => 'required', 
            'password' => 'required', 
            'passwordconfirm' => 'required']);

        [$name, $email, $password, $passwordConfirm] = array($validated["user"], $validated["email"], $validated["password"], $validated["passwordconfirm"]);

        if ($password === $passwordConfirm) {
            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);
            DB::insert("
            INSERT INTO users (email, name, password) 
            VALUES (:email, :name, :password)", 
            ["email" => $email, "name" => $name, "password" => $encryptedPassword]);

            return redirect('/login');

        } else {
            return redirect('/signup');
        }
    }

    // récuprération de tous les utilisateurs
    public function getUsers () {
        $users = DB::select("
            SELECT idUser, name, email, role
            FROM users
        ");

        return view('admin.users', ['users'=> $users]);
    }

    public function toggleRole (Request $request) {
        $validatedData = $request->validate(["idUser" => "required", "role" => "required"]); 
        $userRole = $validatedData["role"];
        $idUser = $validatedData["idUser"];
        
        if ($userRole === 'admin') {
            DB::update("UPDATE users set role = 'apprenant' WHERE idUser = $idUser");
        } else if ($userRole === 'apprenant') {
            DB::update("UPDATE users set role = 'admin' WHERE idUser = $idUser");
        }

        return redirect('/users');
    }

    public function deleteUser (Request $request) {
        $validatedData = $request->validate(["idUser" => "required"]); 
        $idUser = $validatedData["idUser"];
        DB::delete("DELETE FROM users WHERE idUser = $idUser");
     
        return redirect('/users'); 
    }

}