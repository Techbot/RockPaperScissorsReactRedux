<?php
namespace Battle;
/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 16-3-16
 * Time: 21:30
 */
class Npc
{
    private $strength;
    private $dice;
    private $health;

    public function __construct(Dice $dice)
    {
        $this->dice = $dice;
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

}