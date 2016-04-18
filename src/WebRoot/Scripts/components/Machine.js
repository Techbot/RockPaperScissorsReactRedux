import React from 'react';

// React component
var Machine = React.createClass( {
    render(){

        const { machine_rocks, machine_papers, machine_scissors, machine_score, machine_health} = this.props;


        return (
            <div>
                <span>Machine</span><br/>
                <span>Number of Rocks</span>   <span>{machine_rocks}</span><br/>
                <span>Number of Papers</span>   <span>{machine_papers}</span><br/>
                <span>Number of Scissors</span> <span>{machine_scissors}</span><br/>
                <br/>
                <span>Score</span> <span>{machine_score}</span><br/>
                <span>Health</span> <span>{machine_health}</span><br/>
                <br/>
            </div>

        );
    }
});

export default Machine;