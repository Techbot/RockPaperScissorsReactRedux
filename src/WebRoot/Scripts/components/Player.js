import React from 'react';

// React component
var Player = React.createClass( {
    render(){

        const { player_rocks, player_papers, player_scissors, player_score,player_health} = this.props;


        return (
            <div id = "player_class" className="col-lg-4">
            <span>Player</span><br/>
                <span id='stuff'>Number of Rocks</span>   <span>{player_rocks}</span><br/>
                <span>Number of Papers</span>   <span>{player_papers}</span><br/>
                <span>Number of Scissors</span> <span>{player_scissors}</span><br/>
                <br/>
                <span>Score</span> <span>{player_score}</span><br/>
                <span>Health</span> <span>{player_health}</span><br/>
                <br/>
            </div>

        );
    }
});

export default Player;