<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Game');
    }


    function it_allows_player_to_choose_weapon()
    {
        $this->player = new Player();
        $this->playerChoice = $this->player->choice();
 
    }


}
