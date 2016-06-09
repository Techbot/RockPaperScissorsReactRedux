# RockPaperScissorsReactRedux
Simple RockPaperScissors  React Redux game based on https://github.com/jackielii/simplest-redux-example/

Idea is to make a game using state and then record these states to event store.
TDD and BDD practices used when possible (based on my limited knowledge).

In Progress: Partitioning event stream

Next: Introduce Command Bus , refactor

Steps:
 1) Create clean 16.4 Ubuntu server
 2) Ansible Script will create a server ready to use docker compose whuich is uploaded to the ~/ directory
 3) login to server : docker-compose up


Docker Compose Installs
Techbot/Rock-Paper-Sciccors
Mysql
PHP7
EventStore

to do:
PhpyMyadmin

Frontend uses gulp,babel and webpack

Process to date is
BDD: RPS features are setup with Behat.
Simple Bundle created to link ti Fuser and write to Javascript Functional Event Store
Event Store Projections read events split based on Fosuser and return state 
(being number of Rocks Papers and Scissors remaining).

Currently refactoring to introduce Tactician Command Bus and Hexagonal Design