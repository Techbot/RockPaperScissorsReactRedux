<?php
namespace Battle;
class Player
{
    private $strength;
    private $health;
    private $dice;
    public $choice;

    private $npcAttack;

    public function __construct()
    {

        $this->dice     = new Dice();
        $this->health   = 100;
        $this->strenght = 10;
        $this->choice   = 0;
    }

    public function addToStrength($dice)
    {
        $this->strength += $dice;
    }

    public function setAttack($NpcAttack)
    {
        $this->npcAttack = $NpcAttack;
    }

    public function getHealth()
    {
        return $this->health;
    }
    public function setHealth($health)
    {
        $this->health = $health;
    }

    public function getAttack()
    {
        return $this->strength + $this->dice->rollDice();
    }

    public function choose()
    {
        return $this->dice->rollDice();
    }

}