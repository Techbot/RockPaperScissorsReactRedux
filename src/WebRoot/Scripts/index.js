import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider, connect } from 'react-redux';
import Counter from './components/App.js';
import * as actions from './actions/index';

var messages = ['Rock','Paper','Scissors'];
const initialState ={};

// Action:
const increaseAction = {type: 'increase'};

const compareAction = {type:'compare'};

$.ajax({
    url: "http://164.138.27.49:2113/projection/five/state",

}).done(function(result) {
    initialState.player_rocks = result['Player_Rocks'];
    initialState.player_papers = result['Player_Papers'];
    initialState.player_scissors = result['Player_Scissors'];
    initialState.machine_rocks = result['Machine_Rocks'];
    initialState.machine_papers = result['Machine_Papers'];
    initialState.machine_scissors = result['Machine_Scissors'];
    initialState.machine = 1;
    initialState.count = 1;
// Store:
    let store = createStore(counter);

// Map Redux state to component props
    function mapStateToProps(state)  {
        return {
            value: messages[state.count],
            machineChoice: messages[state.machine],
            totalScore: state.score,

            player_rocks: state.player_rocks,
            player_papers: state.player_papers,
            player_scissors: state.player_scissors,

            machine_rocks: state.machine_rocks,
            machine_papers: state.machine_papers,
            machine_scissors: state.machine_scissors
        };
    }

// Map Redux actions to component props
    function mapDispatchToProps(dispatch) {
        return {
            onIncreaseClick: () => dispatch(increaseAction),
            onCompareStates: () => dispatch(compareAction)
        }
    }

// Connected Component:
    let App = connect(
        mapStateToProps,
        mapDispatchToProps
    )(Counter);

    ReactDOM.render(
        <Provider store={store}  >
            <App />
        </Provider>,
        document.getElementById('root')
    );
});

// Reducer:
function counter(state = initialState
    , action) {

    let count = state.count;
    let score = state.score;
    let machine = state.machine;
    let data4 =state.data4;

    let player_rocks = state.player_rocks;
    let player_papers = state.player_papers;
    let player_scissors = state.player_scissors;

    let machine_rocks = state.machine_rocks;
    let machine_papers = state.machine_papers;
    let machine_scissors = state.machine_scissors;

    switch(action.type){

        case 'increase':

            count++;
            if (count>2){
                count=0;
            }

            return {
                count: count,
                score: score,
                machine: machine,
                data4: data4,
                player_rocks: state.player_rocks,
                player_papers: state.player_papers,
                player_scissors: state.player_scissors,
                machine_rocks: state.machine_rocks,
                machine_papers: state.machine_papers,
                machine_scissors: state.machine_scissors
            };

        case 'compare':

            if (count>machine || (count==0&&machine==2)){
                score++;
            }
            if (count<machine || (machine==0&&count==2)){
                score--;
            }

            if (count==machine) {

            }

            // new state
            //machine = Math.floor(Math.random()*3);
            //var messages = ['Rock','Paper','Scissors'];

            if (count == 0){

                player_rocks--;
            }

            if (count == 1){

                player_papers--;
            }

            if (count == 2){
                player_scissors--;
            }


            if (machine == 0){
                machine_rocks--;
            }

            if (machine == 1){
                machine_papers--;
            }

            if (machine == 2){
                machine_scissors--;
            }

            $.ajax({
                url: "app_dev.php/write/4",
                data: {choice:count}
            }).done(function(result) {
                machine = result[1];
            });

            return {
                count: count,
                score: score,
                machine: machine,
                player_rocks: player_rocks,
                player_papers: player_papers,
                player_scissors: player_scissors,
                machine_rocks: machine_rocks,
                machine_papers: machine_papers,
                machine_scissors: machine_scissors
            };
        default:
            return state;
    }
}
