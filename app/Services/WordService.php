<?php

namespace App\Services;

use App\Http\Requests\AttemptWordRequest;
use App\Models\Word;

class WordService
{
    public static function renderResponse($htmlTable, $htmlWiki,  $state){
        return response()->json([
            'htmlTable' => mb_convert_encoding($htmlTable, 'UTF-8', 'UTF-8'),
            'htmlWiki' => $htmlWiki,
            'state' => $state,
        ]);
    }

    public static function renderTableView($turns){
        return view('table')->with(['turns' => $turns])->render();
    }

    public static function renderWikiView($preview){
        return view('wiki-preview')->with(['preview' => $preview])->render();
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
