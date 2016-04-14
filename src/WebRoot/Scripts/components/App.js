// React component
import React from 'react';
import Player from './Player.js';
import Machine from './Machine.js';



// React component

var  Counter = React.createClass( {
    render(){
        const { value, totalScore, machineChoice, onCompareStates, onIncreaseClick,data } = this.props;

         return (
            <span>
        <div>
            <span>Player:{value}</span> <span>Computer:{machineChoice}</span>   <span>Score:{totalScore}</span>
            <button onClick={onIncreaseClick}>Increase</button>
            <button onClick={onCompareStates}>Submit</button>
        </div>
           <Machine data={data}/>
          </span>
        );
    }
});

export default Counter;