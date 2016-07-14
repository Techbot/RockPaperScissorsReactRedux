<?php namespace DeckOfCards\Tests\Domain;
use Application\Domain\Game;
use Application\Domain\GameId;
class GameTest extends \PHPUnit_Framework_TestCase
{
    public function test_a_game_is_created()
    {
        $game = Game::standard(
            GameId::generate()
        );

        $this->assertInstanceOf('Application\Domain\Game' , $game);
    }

}