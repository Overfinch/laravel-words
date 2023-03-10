<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttemptWordRequest;
use App\Models\Word;
use App\Services\State;
use App\Services\StateService;
use App\Services\WordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(State $state){
        $turns = Word::getAllTurns()->toArray();
        return view('index',['state' => $state, 'turns' => $turns]);
    }

    public function attempt(AttemptWordRequest $request, State $state){
        WordService::save($request, $state);
        $word = $request->validated('word');

        $wikiData = WordService::getWikiData($word);
        $htmlWiki = WordService::renderWikiView($wikiData);

        $turns = Word::getAllTurns()->toArray();
        $htmlTable = WordService::renderTableView($turns);
        return WordService::renderResponse($htmlTable, $htmlWiki, $state);
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
