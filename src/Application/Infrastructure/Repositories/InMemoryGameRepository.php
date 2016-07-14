<?php 
namespace Application\Infrastructure\Repositories;
use Application\Domain\Game;
use Application\Domain\GameId;
use Application\Domain\GameRepository;
class InMemoryGameRepository implements GameRepository
{
    /**
     * @var Game[]
     */
    private $items = [];
    /**
     * @param GameId $gameId
     * @return Game|null
     */
    public function findById(GameId $gameId)
    {
        $key = (string) $gameId;
        if (! array_key_exists($key, $this->items)) {
            return null;
        }
        return $this->items[$key];
    }
    /**
     * @param Game $game
     */
    public function add(Game $game)
    {
        $key = (string) $game->getId();
        $this->items[$key] = $game;
    }
}