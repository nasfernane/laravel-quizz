<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LexiconController extends Controller 
{

    public function addWord(Request $request) {
        $validated = $request->validate([
            'word' => 'required'
        ]);

        $word = $validated["word"];
        if (isset($validated['definition'])) $definition = $validated["definition"];


        DB::insert("INSERT INTO words (name) VALUES (:name)", ["name" => $word]);


        if (isset($validated['definition'])) {
            $idWord = DB::select("SELECT idWord FROM words WHERE name='{$word}' LIMIT 1");
            $idWord = $idWord[0]->idWord;
            DB::insert("INSERT INTO definitions (content, idWord) VALUES (:content, :idWord)", ["content" => $definition, "idWord" => $idWord]);
        }

        return redirect ('/lexicon');
        exit();
    }

    // -- version sprint 2 Mathieu
    public function getAllWords() {

        // selectionne tout les mots et définitions, meme les mots sans définition
        // grace au LEFT JOIN
        $listWords=DB::select("SELECT words.*, definitions.idDefinition, definitions.content
        FROM words
        LEFT JOIN definitions ON words.idWord = definitions.idWord");
        
        // traitement pour affiché q'une fois les mots qui ont plusieurs définitions
        $uniqueIdWord = [];
        $i = 0; 
        foreach ($listWords as $value) {
            if (!in_array($value->idWord, $uniqueIdWord)) {
                array_push($uniqueIdWord, $value->idWord);
            } else {
                unset($listWords[$i]);
            }  
            $i++;
        }
        
        return view('lexicon.overview', ['listWords'=> $listWords]);   
        
    }

    // Sprint 2 Mathieu
    public function addDefinition(Request $request){
        $pageId = $request['idWord'];
        
        DB::insert("INSERT INTO definitions (content, idWord, author) 
                    VALUES (:content, :id, :author)", 
                    ["content" => $request['definition'], 
                     "id" => $request['idWord'],
                     "author" => $request['author']]);

    
        return redirect("/definitionsList/$pageId");
    }

    // -- Mathieu
    // affiche toutes les définitions 
    public function showDefinitionList($id){
        [$word] = DB::select('SELECT name, idWord FROM words WHERE words.idWord = ?', [$id]);
        // -- ajout nassim 26/03 10h43 : Abandon en cas d'id non trouvé et renvoi d'une page 404
        abort_if(!isset($word), 404);
      
        $definitionList = DB::select('SELECT * FROM definitions 
                                      INNER JOIN words 
                                      ON definitions.idWord = words.idWord 
                                      WHERE definitions.idWord = ?', [$id]);
        

        return view('lexicon.definitions', ['definitionList' => $definitionList, 'word' => $word]);
    }
}