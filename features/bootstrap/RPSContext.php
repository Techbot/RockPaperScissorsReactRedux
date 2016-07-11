<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
Use PHPUnit_Framework_Assert as Assert;
Use Battle\Dice;
Use Battle\Npc;
Use Battle\Player;

/**
 * Defines application features from the specific context.
 */
class PRSContext implements Context, SnippetAcceptingContext
{
    private $player;
    private $npc;
    private $dice;
    private $dice2;
    private $diff;
    private $game;

    public function __construct()
    {

    
    }



    /**
     * @Given a new Game
     */
    public function aNewGame()
    {
     $this->game = new Game();
    }

    /**
     * @When I chose :arg1
     */
    public function iChose($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When NPC chose :arg1
     */
    public function npcChose($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When NPC health is :arg1
     */
    public function npcHealthIs($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then NPC health should be reduced to :arg1
     */
    public function npcHealthShouldBeReducedTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When my health is :arg1
     */
    public function myHealthIs($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then my health should be reduced to :arg1
     */
    public function myHealthShouldBeReducedTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When NPC has health of :arg1
     */
    public function npcHasHealthOf($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then NPC health should be :arg1
     */
    public function npcHealthShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I have health of :arg1
     */
    public function iHaveHealthOf($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then my health should be :arg1
     */
    public function myHealthShouldBe($arg1)
    {
        throw new PendingException();
    }
}
