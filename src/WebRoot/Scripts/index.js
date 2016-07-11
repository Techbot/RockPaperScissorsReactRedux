import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider, connect } from 'react-redux';
import Counter from './components/App.js';
import * as actions from './actions/index';

var messages = ['Rock','Paper','Scissors'];
const initialState ={};

var machineChoice=0;
var myChoice=1;
var myId=0;
// Action:
var increaseAction = {type: 'increase'};
var compareAction ={type: 'compare', machineChoice:machineChoice};
$.when(
    $.ajax({
        dataType: "json",
        url: 'myid',
        success: function(data) {
         myId=data;
            console.log('id' + myId);
        }
    })

).then( function(myId){

    if (myId !=0) {

//     curl -i -H "Accept:application/atom+xml" "http://46.19.33.139:2113/streams/player-2
        $.ajax({
            url: "http://46.19.33.139:2113/projection/three/state?partition=player-" + myId,
        }).done(function (result) {
            console.log(result);
            initialState.player_rocks = result['player_rocks'];
            initialState.player_papers = result['player_papers'];
            initialState.player_scissors = result['player_scissors'];
            initialState.machine_rocks = result['machine_rocks'];
            initialState.machine_papers = result['machine_papers'];
            initialState.machine_scissors = result['machine_scissors'];
            initialState.player_score = result['player_score'];
            initialState.machineChoice = machineChoice;
            initialState.myChoice = 1;
// Store:
            let store = createStore(counter);

// Map Redux state to component props
            function mapStateToProps(state) {
                return {
                    value: messages[state.myChoice],
                    value2: messages[state.machineChoice],
                    machineChoice: state.machineChoice,
                    totalScore: state.score,
                    player_rocks: state.player_rocks,
                    player_papers: state.player_papers,
                    player_scissors: state.player_scissors,
                    machine_rocks: state.machine_rocks,
                    machine_papers: state.machine_papers,
                    machine_scissors: state.machine_scissors,
                    machine_score: state.player_score,
                };
            }

// Map Redux actions to component props
            function mapDispatchToProps(dispatch) {
                return {
                    onIncreaseClick: () => dispatch(increaseAction),
                    onCompareStates: () => {

                        $.ajax({
                            url: "round",
                            data: {choice: myChoice}
                        }).done(function (result) {
                            machineChoice = JSON.parse(result)[0];
                            console.log(JSON.parse(result)[0], myChoice);
                        });
                        dispatch(compareAction)
                    }
                }
            }

// Connected Component:

            let App = connect(
                mapStateToProps,
                mapDispatchToProps
            )(Counter);

            ReactDOM.render(
                <Provider store={store}>
                    <App />
                </Provider>,
                document.getElementById('root')
            );
        });
    }




});

// Reducer:
function counter(state = initialState
    , action) {

    myChoice = state.myChoice;

    let score = state.score;
    let data4 =state.data4;
    let player_rocks = state.player_rocks;
    let player_papers = state.player_papers;
    let player_scissors = state.player_scissors;
    let machine_rocks = state.machine_rocks;
    let machine_papers = state.machine_papers;
    let machine_scissors = state.machine_scissors;
    let player_score = state.player_score;    

    switch(action.type){

        case 'increase':

            myChoice++;
            if (myChoice>2){
                myChoice=0;
            }

            return {
                myChoice: myChoice,
                score: score,
                machineChoice: state.machineChoice,
                data4: data4,
                player_rocks: state.player_rocks,
                player_papers: state.player_papers,
                player_scissors: state.player_scissors,
                machine_rocks: state.machine_rocks,
                machine_papers: state.machine_papers,
                machine_scissors: state.machine_scissors,
                player_score: state.player_score
            };

        case 'compare':

            console.log(machineChoice);

           if (myChoice>machineChoice || (myChoice==0&&machineChoice==2)){
                score++;
            }
            if (myChoice<machineChoice || (machineChoice==0&&myChoice==2)){
                score--;
            }

            if (myChoice==machineChoice) {
                //do nothing yet
            }

            if (myChoice == 0){

                player_rocks--;
            }

            if (myChoice == 1){

                player_papers--;
            }

            if (myChoice == 2){
                player_scissors--;
            }

            if (machineChoice == 0){
                machine_rocks--;
            }

            if (machineChoice == 1){
                machine_papers--;
            }

            if (machineChoice == 2){
                machine_scissors--;
            }

            return {
                myChoice: myChoice,
                score: score,
                machineChoice: machineChoice,
                player_rocks: player_rocks,
                player_papers: player_papers,
                player_scissors: player_scissors,
                machine_rocks: machine_rocks,
                machine_papers: machine_papers,
                machine_scissors: machine_scissors,
                player_score: player_score
            };

        default:
            return state;
    }
}
















