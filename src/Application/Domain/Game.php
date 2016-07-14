<?php

namespace Application\Domain;

class Game
{
    /**
     * @var GameId
     */
    private $id;

    /**
     * @param GameId $id

     */
    public function __construct(GameId $id)
    {
        $this->id = $id;
      
    }

    public function round($playerChoice, $npcChoice)
    {
        if ($playerChoice == 2 && $npcChoice == 0) {
            return 'lose';
        }

        if ($playerChoice == 0 && $npcChoice == 2) {
            return 'win';
        }

        if ($playerChoice < $npcChoice) {
            return 'lose';
        }

        if ($playerChoice > $npcChoice) {
            return 'win';
        }
        return 'draw';
    }

    public function retrieveScore($playerScore, $result)
    {
        if ($result == 'win') {
            $playerScore++;
        }

        if ($result == 'lose') {
            $playerScore--;
        }
        return $playerScore;
    }


    /**
     * @param GameId $gameId
     * @return Game
     */
    public static function standard(GameId $gameId)
    {
        return new Game($gameId);

    }

    /**
     * @return GameId
     */
    public function getId()
    {
        return $this->id;
    }


}