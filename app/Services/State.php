<?php

namespace App\Services;

use App\Models\Word;

class State{
    private $lastWordModel;
    public $lastWord = '';
    public $lastLetter = '';
    public $actualPlayer = null;
    public $lastTurn = null;

    public function __construct(){
        // Берём последнее вставленное слово в базу
        $this->lastWordModel = Word::getLastWord();
        // Инициализируем "Состояние"
        $this->init();
    }

    public function initWithNewWord(Word $word){
        $this->lastWordModel = $word;
        $this->init();
    }

    public function init(){
        // Если в базе есть слово, инициализируем "Состояние" на основе последнего,
        // если в базе нету слов, инициализируем на как первый ход
        !empty($this->lastWordModel)
            ?  $this->initActualProperties()
            : $this->initFirstTurnProperties();
    }

    public function initActualProperties(){
        $this->lastWord = $this->getLastWord();
        $this->lastLetter = $this->getLastLetter();
        $this->actualPlayer = $this->getActualPlayer();
        $this->lastTurn = $this->getLastTurn();
    }

    public function initFirstTurnProperties(){
        $this->lastWord = null;
        $this->lastLetter = "А";
        $this->actualPlayer = 1;
        $this->lastTurn = 0;
    }

    public function getLastWord(){
        return $this->lastWordModel->word;
    }

    public function getLastLetter($letterIndex = -1){
        $lastLetter = mb_strtoupper(mb_substr($this->lastWordModel->word, $letterIndex, 1));
        if (in_array($lastLetter,['Ь','Ы','Й','Ъ'])){
            return $this->getLastLetter($letterIndex - 1);
        }else{
            return $lastLetter;
        }
    }

    public function getActualPlayer(){
        return ($this->lastWordModel->player_id == 1) ? 2 : 1;
    }

    public function getLastTurn(){
        return $this->lastWordModel->turn;
    }
}
