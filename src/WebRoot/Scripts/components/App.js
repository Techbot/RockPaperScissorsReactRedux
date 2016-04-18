// React component
import React from 'react';
import Player from './Player.js';
import Machine from './Machine.js';

// React component

var Counter = React.createClass( {
    render(){
        const { value, totalScore, machine_rocks,machine_papers,machine_scissors,machineChoice, onCompareStates, onIncreaseClick,data, player_rocks, player_papers , player_scissors} = this.props;

         return (
            <span>
                <div>git
                <span>Player:{value}</span> <span>Computer:{machineChoice}</span>   <span>Score:{totalScore}</span>
                <button onClick={onIncreaseClick}>Increase</button>
                <button onClick={onCompareStates}>Submit</button>
                </div>
                <Player player_rocks={player_rocks} player_papers={player_papers} player_scissors={player_scissors}/>
                <Machine machine_rocks={machine_rocks} machine_papers={machine_papers} machine_scissors={machine_scissors}/>

          </span>
        );
    }
});
export default Counter;