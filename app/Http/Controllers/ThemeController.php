<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller 
{
    public function themesOverview () {

        $themes = DB::select("SELECT * from categories");
    
        // $words = DB::select("SELECT words.name, words.idWord, categories.name
        // FROM words
        // JOIN categories 
        // ON words.idCategory = categories.idCategory");

        $words = DB::select("SELECT words.name, words.idWord, categories.categoryName
        FROM words
        LEFT JOIN categories
        on words.idCategory = categories.idCategory
        ");
        
        
        return view('admin.themes', ['words' => $words, 'themes' => $themes]); 
    }


    // public function addTheme(Request $request) {
    //     $validated = $request->validate([
    //         'word' => 'required', 
    //         'definition' => 'required']);

    //     [$word, $definition] = array($validated["word"], $validated["definition"]);

    //     DB::insert("INSERT INTO words (name) VALUES (:name)", ["name" => $word]);

    //     $idWord = DB::select("SELECT idWord FROM words WHERE name='{$word}' LIMIT 1");
    //     $idWord = $idWord[0]->idWord;

    //     DB::insert("INSERT INTO definitions (content, idWord) VALUES (:content, :idWord)", ["content" => $definition, "idWord" => $idWord]);
            
    //     return redirect ('/lexicon');
    //     exit();
    // }



}