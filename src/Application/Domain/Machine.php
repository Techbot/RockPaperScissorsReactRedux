<?php

namespace Application\Domain;

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
    
    public function choose()
    {
        return rand(0,2);
    }
}
