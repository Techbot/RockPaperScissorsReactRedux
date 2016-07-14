<?php

namespace Application\Domain;

class Player
{
    private $choice;
    private $score;
    
    public function __construct(){
         $this->score = 4;
    }
    
    public function getChoice(){
        return $this->choice;
    }

    public function setChoice($choice){
        $this->choice= $choice;
    }
    public function getScore(){
        return $this->score;
    }

    public function setScore($score){
        $this->score= $score;
    }
}

