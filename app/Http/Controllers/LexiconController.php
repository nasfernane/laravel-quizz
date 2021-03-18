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

}