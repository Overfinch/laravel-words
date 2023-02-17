<?php

namespace App\Services;

use App\Http\Requests\AttemptWordRequest;
use App\Models\Word;

class WordService
{
    public static function renderResponse($html, $state){
        return response()->json([
            'html' => mb_convert_encoding($html, 'UTF-8', 'UTF-8'),
            'state' => $state,
        ]);
    }

    public static function renderView($turns){
        return view('table')->with(['turns' => $turns])->render();
    }

     public static function save(AttemptWordRequest $request, State $state){
         $word = new Word([
             'word' => $request->validated('word'),
             'player_id' => $state->actualPlayer,
             'turn' => ($state->actualPlayer == 1) ? $state->lastTurn + 1 : $state->lastTurn
         ]);

         if ($word->save()){
             $state->initWithNewWord($word);
         }
     }
}
