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
  - First player whose health = 0 loses

  Scenario: Player attack is greater than NPC attack
    Given a new Game
    When I chose 2
    And NPC chose 1
    And NPC health is 100
    Then NPC health should be reduced to 90

  Scenario: Player attack is less than NPC attack
    Given a new Game
    When I chose 0
    And NPC chose 1
    And my health is 100
    Then my health should be reduced to 90

  Scenario: Player attack is equal than NPC attack
    Given a new Game
    When I chose 0
    And NPC chose 0
    And NPC has health of 100
    Then NPC health should be 100

  Scenario: Player attack is 0  and NPC attack is 2
    Given a new Game
    When I chose 0
    And NPC chose 2
    And NPC has health of 100
    Then NPC health should be 90

  Scenario: Player attack is 2  and NPC attack is 1
    Given a new Game
    When I chose 2
    And NPC chose 0
    And I have health of 100
    Then my health should be 90