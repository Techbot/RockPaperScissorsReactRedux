<?php

namespace Application;

class Machine
{
    private $choice;

    
    public function __construct(){

    }
    
    public function getChoice(){
        return $this->choice;
    }
    public function setChoice($choice)
    {
        $this->choice = $choice;
    }

}

