<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
Use PHPUnit_Framework_Assert as Assert;
use Application\Domain\Player;
use Application\Domain\Machine;
Use Application\Domain\Game;
Use Application\Domain\GameId;
Use Application\CreateGame;
Use Application\CreateGameHandler;
Use Application\Infrastructure\Repositories\InMemoryGameRepository;
use League\Tactician\CommandBus;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
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
        $locator = new InMemoryLocator([]);
        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor,
            $locator,
            new HandleInflector
        );
        $bus = new CommandBus([$handlerMiddleware]);

        //$this->game = new Game(GameId::generate());

        $games = new InMemoryGameRepository();
        $locator->addHandler(
            new CreateGameHandler($games),
            CreateGame::class
        );
        $gameId = GameId::generate();
        $bus->handle(
            new \Application\CreateGame((string) $gameId)
        );
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
