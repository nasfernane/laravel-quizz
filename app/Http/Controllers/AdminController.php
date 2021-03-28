<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller 
{

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


    // -- Halima
    public function addValidation(Request $request) {
        $validatedData = $request->validate([
            "idDefinition" => "required"]);

        $idDefinition = $validatedData["idDefinition"];
        
        DB::table('definitions')
              ->where('idDefinition', $idDefinition)
              ->update(['is_valid' => 1]);
        return redirect('/validation'); 
    }

    public function removeValidation(Request $request) {
        $validatedData = $request->validate([
            "idDefinition" => "required"]);

        $idDefinition = $validatedData["idDefinition"];
        
        DB::table('definitions')
              ->where('idDefinition', $idDefinition)
              ->update(['is_valid' => 0]);
        return redirect('/validation'); 
    }

    public function validationList(Request $request) {
        $listDefinitions =DB::select("SELECT words.*, definitions.idDefinition, definitions.content, definitions.is_valid, definitions.comment
        FROM words 
        INNER JOIN definitions 
        ON words.idWord = definitions.idWord
        ORDER BY definitions.idDefinition DESC" );
        return view('admin.validation', ['listDefinitions'=> $listDefinitions]);   
        
    }

    public function addComment(Request $request) {
        $validatedData = $request->validate([
            "comment" => "required",
            "idDefinition" => "required"]);
            
        $comment = $validatedData["comment"];
        $iddefinition = $validatedData["idDefinition"];
        
        DB::table('definitions')->where('idDefinition', '=', $iddefinition)->update([
            'comment' => $comment
        ]);
        
        return redirect('/validation'); 
    }

}