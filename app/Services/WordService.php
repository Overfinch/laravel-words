<?php

namespace App\Services;

use App\Http\Requests\AttemptWordRequest;
use App\Models\Word;
use Illuminate\Support\Facades\Http;
use Illuminated\Wikipedia\Wikipedia;

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

    public static function renderWikiView($data){
        return view('wiki-preview')->with(['data' => $data])->render();
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

     public static function getWikiData($word){
         $response = Http::get('https://ru.wikipedia.org/api/rest_v1/page/summary/'.$word);
         $json = $response->json();
         $data['html'] = $json['extract_html'] ?? null;
         $data["img_url"] = $json["thumbnail"]["source"] ?? null;
         return $data;
     }
}
