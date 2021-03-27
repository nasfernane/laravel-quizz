<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizzController extends Controller 
{

    // public function getDefinition(Request $request) {
    //     // "?" = marqueur de requete, je le definis juste apres.
    //     $definition = DB::select("SELECT * FROM definitions WHERE idWord=?", [$request["idWord"]]);
        
    //     return view('definition',["definitions" => $definition]);
    // }

    // public function createQuizz() {
    //     // selectionne tout dans la table word
    //     $words = DB::select("
    //         SELECT definitions.content, words.name 
    //         FROM definitions
    //         INNER JOIN words 
    //         ON definitions.idWord = words.idWord
    //         ORDER BY RAND() 
    //         LIMIT 10
    //     ");

    //     return view('pages/quizz', ["words" => $words]);
    // }

    // sprint 2

    public function createQuizz() {
        // selectionne tout dans la table word
        $words = DB::select("
            SELECT definitions.content, definitions.author, words.name, words.idWord 
            FROM definitions
            INNER JOIN words 
            ON definitions.idWord = words.idWord
            ORDER BY RAND() 
            LIMIT 10
        ");

        return view('pages/quizz', ["words" => $words]);
    }
    
    public function addTerme(Request $request)
    {
        $validatedData = $request->validate(["definition" => "required", "auteur" => "required", "idWord" => "required"]);        
        $content = $validatedData["definition"];
        $auteur = $validatedData["auteur"];
        $idWord = $validatedData["idWord"];               
                
        DB::insert("INSERT INTO definitions (content,idWord,author)  
         VALUES ('$content','$idWord','$auteur')");                          
              
         return redirect ('/quizz');
         exit();
        
    }
    // Sprint 2 --//

}