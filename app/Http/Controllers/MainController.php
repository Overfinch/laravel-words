<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttemptWordRequest;
use App\Models\Word;
use App\Services\State;
use App\Services\StateService;
use App\Services\WordService;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(State $state)
    {
        $turns = Word::getAllTurns()->toArray();
        return view('index',['state' => $state, 'turns' => $turns]);
    }

    public function attempt(AttemptWordRequest $request, State $state){

        $word = new Word([
            'word' => $request->validated('word'),
            'player_id' => $state->actualPlayer,
            'turn' => ($state->actualPlayer == 1) ? $state->lastTurn + 1 : $state->lastTurn
        ]);

        if ($word->save()){
            $state = new State();
        }

        $turns = Word::getAllTurns()->toArray();

        $html = view('table')->with(['turns' => $turns])->render();
        return response()->json([
            'html' => mb_convert_encoding($html, 'UTF-8', 'UTF-8'),
            'state' => $state,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
