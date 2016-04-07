<?php


/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 22-3-16
 * Time: 19:05
 */

//require_once  'vendor/autoload.php';

class DiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function dice_roll_is_between_1_and_6()
    {
        $game = new \Battle\Dice();
        $roll = $game->rollDice();
        $this->assertTrue($roll>0);
    }
}
