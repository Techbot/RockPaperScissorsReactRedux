<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
Use PHPUnit_Framework_Assert as Assert;
Use Battle\Dice;
Use Battle\Npc;
Use Application\Player;
Use Application\Game;
Use Application\Machine;
/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    private $player;
    private $playerChoice;
    private $npcChoice;
    private $diff;
    private $game;
    private $machine;
    private $oldScore;

    public function __construct()
    {
        $this->player = new Player();
        $this->machine = new Machine();
    }

    /**
     * @Given a new Game
     */
    public function aNewGame()
    {
        $this->game = new Game();
    }

    /**
     * @When Player chose :weapon
     */
    public function playerChose($weapon)
    {
        $this->player->setChoice($weapon);
    }

    /**
     * @When NPC chose :npcWeapon
     */
    public function npcChose($npcWeapon)
    {
        $this->machine->setChoice($npcWeapon);
    }

    /**
     * @When a round is played
     */
    public function aRoundIsPlayed()
    {
        $this->oldScore = $this->player->getScore();
        $result = $this->game->round($this->player->getChoice(), $this->machine->getChoice());
        $this->player->setScore($this->game->retrieveScore($this->oldScore, $result));

    }

    /**
     * @Then Player Score should be increased by :score
     */
    public function playerScoreShouldBeIncreasedBy($score)
    {
        Assert::assertTrue($this->player->getScore() == $this->oldScore + $score);
    }

    /**
     * @Then Player score should be reduced  by :score
     */
    public function playerScoreShouldBeReducedBy($score)
    {
        Assert::assertTrue($this->player->getScore() == $this->oldScore - $score);
    }

    /**
     * @Then Player score should stay the same
     */
    public function playerScoreShouldStayTheSame()
    {
        Assert::assertTrue($this->player->getScore() == $this->oldScore);
    }
}
