<?php
/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 14/07/16
 * Time: 12:52
 */

namespace Application;


final class CreateGameHandler
{
    /**
     * @var GameRepository
     */
    private $games;

    /**
     * @param GameRepository $games
     */
    public function __construct(GameRepository $games)
    {
        $this->games = $games;
    }

    /**
     * @param CreateGame $command
     */
    public function handle(CreateGame $command)
    {
        $id = $command->getId();

        $game = Game::standard($id);

        $this->games->add($game);
    }
}
