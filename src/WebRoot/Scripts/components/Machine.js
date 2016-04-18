import React from 'react';

// React component
var Machine = React.createClass( {
    render(){

        const { machine_rocks, machine_papers, machine_scissors, machine_score, machine_health} = this.props;


        return (
            <div>
            <div class="col-lg-4">
                <span>Machine</span><br/>
                <div>Number of Rocks</div>   <span>{machine_rocks}</span><br/>
                <div>Number of Papers</div>   <span>{machine_papers}</span><br/>
                <div>Number of Scissors</div> <span>{machine_scissors}</span><br/>
                <br/>
                <span>Score</span> <span>{machine_score}</span><br/>
                <span>Health</span> <span>{machine_health}</span><br/>
                <br/>
            </div>
</div>
        );
    }
});

export default Machine;