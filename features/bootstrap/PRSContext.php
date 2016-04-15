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

    public function __construct()
    {

        $this->dice = new Dice();
        $this->dice2 = new Dice();
        $this->npc = new Npc($this->dice2);
        $this->player = new Player($this->dice, $this->npc);
    }


    /**
     * @Given NPC chose :arg1
     */
    public function npcChose()
    {
        return  $this->npc->choose();
    }

    /**
     * @When I chose :arg1
     */
    public function iChose()
    {
        return  $this->player->choose();
    }

    /**
     * @When NPC health is :arg1
     */
    public function npcHealthIs()
    {
        return  $this->npc->getHealth();
    }





    /**
     * @Then NPC health should be reduced to :arg1
     */
    public function npcHealthShouldBeReducedTo($arg1)
    {

        $this->npc->setHealth($arg1);
        return ;



    }


    /**
     * @When my health is :arg1
     */
    public function myHealthIs($arg1)
    {
        $this->player->getHealth($arg1);
    }

    /**
     * @Then my health should be reduced to :arg1
     */
    public function myHealthShouldBeReducedTo($arg1)
    {
        $this->player->getHealth($arg1);
    }

    /**
     * @When NPC has health of :arg1
     */
    public function npcHasHealthOf($arg1)
    {
        $this->npc->getHealth($arg1);
    }

    /**
     * @Then NPC health should be :arg1
     */
    public function npcHealthShouldBe($arg1)
    {
        $this->npc->getHealth($arg1);
    }

    /**
     * @When I have health of :arg1
     */
    public function iHaveHealthOf($arg1)
    {
        $this->npc->getHealth($arg1);
    }

    /**
     * @Then my health should be :arg1
     */
    public function myHealthShouldBe($arg1)
    {
        $this->npc->getHealth($arg1);
    }

}