Feature: Rock Paper Scissors Battle
  in order to play game
  As a player
  I need to attack another  npc player

  Rules :
  - Player chooses between rock paper scissors
  - machine chooses random number beween 0 and 2
  - Player with lower attack  loses 10 health points
  - Unless player chooses 0 and machine chooses 2
  - Unless machine chooses 0 and player chooses 2

  Scenario: Player attack is greater than NPC attack
    Given a new Game
    When I chose 2
    And NPC chose 1
    Then Player Score should be increased by 1

  Scenario: Player attack is less than NPC attack
    Given a new Game
    When Player chose 0
    And NPC chose 1
    Then Player score should be reduced  by 1

  Scenario: Player attack is equal than NPC attack
    Given a new Game
    When Player chose 0
    And NPC chose 0
    Then my score should stay the same

  Scenario: Player attack is 0  and NPC attack is 2
    Given a new Game
    When Player chose 0
    And NPC chose 2
    Then my score should increase by 1

  Scenario: Player attack is 2  and NPC attack is 1
    Given a new Game
    When Player chose 2
    And NPC chose 0
    Then Player score should be reduced  by 1