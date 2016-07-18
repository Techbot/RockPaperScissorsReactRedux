# RockPaperScissorsReactRedux
Simple RockPaperScissors  React Redux game based on several tutorials including

 https://github.com/jackielii/simplest-redux-example/
 
 https://www.sitepoint.com/command-buses-demystified-a-look-at-the-tactician-package/

Idea is to make a game using state and then record these states to event store.
TDD and BDD practices used when possible (based on my limited knowledge).

In Progress: Partitioning event stream perUser

Next: 
refactor to introduce Tactician Command Bus and Hexagonal Design

##Steps:
 1) Create clean 16.4 Ubuntu server
 
 2) Ansible Script will create a server ready to use docker compose whuich is uploaded to the ~/ directory
 
 3) login to server : docker-compose up


##Docker Compose Installs
Techbot/Rock-Paper-Sciccors
Mysql
PHP7
EventStore

##to do:
PhpyMyadmin

##Frontend uses 
gulp, 
babel 
webpack
react/redux

##Process to date is
BDD: RPS features are setup with Behat. The Dice context is not being used at present, but I'm keeping it in to display two contexts in action

Simple Bundle created to link to FosUser and write to Javascript Functional Event Store
Event Store Projections read events split based on Fosuser and return state 
(being number of Rocks Papers and Scissors remaining).

##UnitTests: 
I've broken everything temporarily.

