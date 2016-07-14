<?php
namespace Application\Domain;
interface GameRepository
{
    /**
     * @param GameId $gameId
     * @return Game
     */
    public function findById(GameId $gameId);
    /**
     * @param Game $game
     */
    public function add(Game $game);
}