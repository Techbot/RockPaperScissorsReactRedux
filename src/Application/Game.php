<?php

namespace Application;

class Game
{
    public function round($playerChoice, $npcChoice)
    {
        if ($playerChoice > $npcChoice || ($playerChoice == 0 && $npcChoice == 2)) {
            return 'win';
        }

        if ($playerChoice < $npcChoice || ($playerChoice == 2 && $npcChoice == 0)) {
           
           echo 'lose';
           
            return 'lose';
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
            
            echo 'lose';
        }
        return $playerScore;
    }
}
