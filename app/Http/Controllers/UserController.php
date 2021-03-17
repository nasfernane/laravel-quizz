<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller 
{

    public function createUser(Request $request) {
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
    }

}