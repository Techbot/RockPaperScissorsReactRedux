<?php
namespace Battle;

class Game
{
    private $player;
    private $npc;
    private $machineChoice=1;

    function __construct()
    {
        $this->player = new Player();
        $this->npc = new Npc();
    }

    /**
     * @param $playerChoice
     * @return array
     */
    public function get_machineChoice()
    {
        $this->machineChoice  = $this->npc->choose();
       return $this->machineChoice;
    }
/**
     * @param $playerChoice
     * @return array
     */
    public function buy($playerChoice)
    {
        $this->player->choice = $playerChoice;
        if (  $this->player->choice ===0){
        $paper = $paper + 10;
        $cost = $cost +1 ;    
        }
        if (  $this->player->choice ===0){
            $paper = $paper + 10;
            $cost = $cost +1 ;
        }
        if (  $this->player->choice ===0){
            $paper = $paper + 10;
            $cost = $cost +1 ;
        }
        return $this->machineChoice;
    }

    public function compare($playerChoice,$machineChoice){
        if (  $this->player->choice > $this->machineChoice){
            return 'win';
        }
        if (  $this->player->choice < $this->machineChoice) {
            return 'lose';
        }
        return 'draw';
    }
}
