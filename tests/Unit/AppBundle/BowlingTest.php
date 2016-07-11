<?php
namespace Bowling;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $numberOfPinsKnockedDown
     * @param int $expectedScore
     * @test
     * @dataProvider provideNumbersOfPinsKnockedDownAndExpectedScores
     */
    public function current_score_equals_number_of_pins_knocked_down_on_new_game(
        $numberOfPinsKnockedDown,
        $expectedScore
    ) {
        $game = new Game();

        $game->thrownBall($numberOfPinsKnockedDown);
        $this->assertEquals($expectedScore, $game->currentScore());
    }

    /**
     * @return array
     */
    public function provideNumbersOfPinsKnockedDownAndExpectedScores()
    {
        return [
            [6, 6],
            [4, 4]
        ];
    }

    /**
     * @test
     */
    public function current_score_is_tracked_across_multiple_throws()
    {
        $game = new Game();
        $game->thrownBall(6);
        $game->thrownBall(3);

        $this->assertEquals(9, $game->currentScore());
    }
}
