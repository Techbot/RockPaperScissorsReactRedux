<?php

namespace Application;

class Game
{
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
}
