<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
Use PHPUnit_Framework_Assert as Assert;
Use Battle\Dice;

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

    }
}