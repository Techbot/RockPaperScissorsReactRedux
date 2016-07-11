<?php

namespace Application;

class Machine
{
    private $choice;
    private $score;
    
    public function __construct(){
        $this->choice =2;
        $this->score = 4;
    }
    
    public function getChoice(){
        return $this->choice;
    }
    public function setChoice($choice)
    {
        $this->choice = $choice;
    }
    public function getScore(){
        return $this->score;
    }
}

