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
        $this->initProperties();
    }

    public function initProperties(){
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

    public function getLastLetter(){
        return strtoupper(($this->lastWordModel->word)[-1]);
    }

    public function getActualPlayer(){
        return ($this->lastWordModel->player_id == 1) ? 2 : 1;
    }

    public function getLastTurn(){
        return $this->lastWordModel->turn;
    }
}
