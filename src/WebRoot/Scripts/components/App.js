// React component
import React from 'react';
import Player from './Player.js';
import Machine from './Machine.js';

// React component

var Counter = React.createClass( {
    render(){
        const { value,
            value2,
            totalScore,
            machine_rocks,
            machine_papers,
            machine_scissors,
            machineChoice,
            onCompareStates,
            onIncreaseClick,
            data,
            player_rocks,
            player_papers,
            player_scissors
            } = this.props;

         return (
            <span>
                <div id = "player" className="col-lg-4">
                    <span>Player:{value}</span>

                </div>
                <button onClick={onIncreaseClick}>Increase</button>
                 <div id = "computer" className="col-lg-4">
                    <span>Computer:{value2}</span>
                 </div>


                    <span>Score:{totalScore}</span>

                    <button onClick={onCompareStates}>Submit</button>


                <Player player_rocks={player_rocks} player_papers={player_papers} player_scissors={player_scissors}/>
                <Machine machine_rocks={machine_rocks} machine_papers={machine_papers} machine_scissors={machine_scissors}/>
            </span>
        );
    }
});
export default Counter;