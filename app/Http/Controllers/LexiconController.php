<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LexiconController extends Controller 
{

    public function addWord(Request $request) {
        $validated = $request->validate([
            'word' => 'required', 
            'definition' => 'required']);

        [$word, $definition] = array($validated["word"], $validated["definition"]);

        DB::insert("INSERT INTO words (name) VALUES (:name)", ["name" => $word]);

        $idWord = DB::select("SELECT idWord FROM words WHERE name='{$word}' LIMIT 1");
        $idWord = $idWord[0]->idWord;

        DB::insert("INSERT INTO definitions (content, idWord) VALUES (:content, :idWord)", ["content" => $definition, "idWord" => $idWord]);
            
        return redirect ('/lexicon');
        exit();
    }

    public function getAllWords(Request $request) {
        $listWords=DB::select("SELECT words.*, definitions.idDefinition, definitions.content
        FROM words
        INNER JOIN definitions ON words.idWord = definitions.idWord");
        return view('pages/lexicon', ['listWords'=> $listWords]);   
        
    }

    public function deleteWord(Request $request) {
        $validatedData = $request->validate([
            "idWord" => "required",
            "idDefinition" => "required"]);
            
        $idword = $validatedData["idWord"];
        $iddefinition = $validatedData["idDefinition"];
        
        DB::table('definitions')->where('idDefinition', '=', $iddefinition)->delete();
        DB::delete("DELETE FROM `words` WHERE `words`.`idWord` = $idword"  );
         
        return redirect('/lexicon'); 
    }

}