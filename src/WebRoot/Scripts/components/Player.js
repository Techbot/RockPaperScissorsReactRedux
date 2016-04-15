import React from 'react';

// React component
var Player = React.createClass( {
    render(){

        const { player_rocks, player_papers, player_scissors} = this.props;


        return (
            <div>
            <span>Player</span><br/>
                <span>Number of Rocks</span>   <span>{player_rocks}</span><br/>
                <span>Number of Papers</span>   <span>{player_papers}</span><br/>
                <span>Number of Scissors</span> <span>{player_scissors}</span><br/>
            </div>

        );
    }
});

export default Player;