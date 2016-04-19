<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 18/04/2016
 * Time: 09:15
 */

namespace Battle;

class Game
{
    private $player;
    private $npc;
    private $machineChoice;

    function __construct()
    {
        $this->player = new Player();
        $this->npc = new Npc();
    }

    /**
     * @param $playerChoice
     * @return array
     */
    public function get_round($playerChoice)
    {
        $this->player->choice = $playerChoice;
        $this->machineChoice = $this->npc->choose();

        if (  $this->player->choice > $this->machineChoice){

            $this->npc->setHealth($this->npc->getHealth() - 10);

            return ['win',$this->machineChoice];

        }

        if (  $this->player->choice < $this->machineChoice) {

            $this->player->setHealth($this->player->getHealth() - 10);

            return ['lose',$this->machineChoice];

        }

    }
}