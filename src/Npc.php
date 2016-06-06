<?php
namespace Battle;
class Npc
{
    private $strength;
    private $dice;
    private $health;

    public function __construct()
    {
        //$this->dice = new Dice();
        $this->health = 100;
        $this->strength = 10;
    }

    public function addToStrength($dice)
    {
        $this->strength += $dice;
    }

    public function setAttack($NpcAttack)
    {
        $this->NpcAttack = $NpcAttack;
    }

    public function getAttack()
    {
       return $this->strength + $this->dice->getDiceValue();
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        $this->health = $health;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    public function choose()
    {
        return rand(0,2);
    }

}