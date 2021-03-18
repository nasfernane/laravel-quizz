<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizzController extends Controller 
{

    public function getDefinition(Request $request) {
        // "?" = marqueur de requete, je le definis juste apres.
        $definition = DB::select("SELECT * FROM definitions WHERE idWord=?", [$request["idWord"]]);
        
        return view('definition',["definitions" => $definition]);
    }

    public function createQuizz() {
        // selectionne tout dans la table word
        $words = DB::select("SELECT * FROM words");
        // genere un numero aleatoire entre 1 et la longueur du tableu qui contient le resultat de la requete
        $random = rand(0, count($words)-1);
        // stock dans word l'element que je veux afficher
        $word = $words[$random];

        return view('quizz', ["word" => $word]);
    }

}