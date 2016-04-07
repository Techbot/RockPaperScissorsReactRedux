<?php
namespace Battle;
class Player
{
    private $strength;
    private $health;
    private $dice;
    private $npc;
    private $npcAttack;

    public function __construct(Dice $dice, $npc)
    {
        $this->npc      = $npc;
        $this->dice     = $dice;
        $this->health   = 100;
        $this->strenght = 10;
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

}