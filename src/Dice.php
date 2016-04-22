<?php
/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 16-3-16
 * Time: 21:16
 */
namespace Battle;

class Dice
{
    /**
     * @return int
     */
    public function rollDice()
    {
        return rand(1,6);
    }

    /**
     * @return int
     */
    public function getDiceValue()
    {
        return rand(1,6);
    }
}