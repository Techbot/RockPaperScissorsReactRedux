<?php

namespace spec\Application;

use Application\Domain\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    private $player;
    private $playerChoice;

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Game');
    }

    function it_allows_player_to_choose_weapon()
    {
        $this->player = new Player();
        $this->playerChoice = $this->player->getChoice();
 
    }
}
