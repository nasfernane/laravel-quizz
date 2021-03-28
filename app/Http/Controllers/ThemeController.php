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

        $words = DB::select("SELECT words.*, categories.categoryName
        FROM words
        LEFT JOIN categories
        on words.idCategory = categories.idCategory
        ");
        
        
        return view('admin.themes', ['words' => $words, 'themes' => $themes]); 
    }

    public function modifyTheme (Request $request) {
            $validatedData = $request->validate([
                "theme" => "required", "idWord" => "required|integer"]);
    
            $idWord = $validatedData["idWord"];
            $idCategory = $validatedData["theme"];
            
            DB::table('words')
                  ->where('idWord', $idWord)
                  ->update(['idCategory' => $idCategory]);

            return response()->noContent();
    }

    public function addTheme(Request $request) {
        $validated = $request->validate([ 
            'theme' => 'required'
        ]);

        $theme = $validated["theme"];

        DB::insert("INSERT INTO categories (categoryName) VALUES (:categoryName)", ["categoryName" => $theme]);
            
        return redirect ('/themes');
        exit();
    }



}