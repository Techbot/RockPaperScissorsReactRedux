fromCategory('player')
    .foreachStream()
    .when({
        "init": function(state, event) {
            return {
                player_rocks: 10,
                player_papers: 10,
                player_scissors: 10,
                machine_rocks: 10,
                machine_papers: 10,
                machine_scissors: 10,
                player_score:0,
                count: 0
            }
        },
        "round": function(state, event) {
            switch (event.data.playerChoice) {
                case 0:
                    state.player_rocks--;
                    break;
                case 1:
                    state.player_papers--;
                    break;
                case 2:
                    state.player_scissors--;
                    break;
            }

            switch (event.data.machineChoice) {
                case 0:
                    state.machine_rocks--;
                    break;
                case 1:
                    state.machine_papers--;
                    break;
                case 2:
                    state.machine_scissors--;
                    break;
            }

            if (  event.data.playerChoice > event.data.machineChoice ||
                (event.data.playerChoice ==0 &&event.data.machineChoice ==2)){
                state.player_score++;
            }

            if ( event.data.playerChoice < event.data.machineChoice ||
            (event.data.playerChoice ==2 &&event.data.machineChoice ==0) ) {
                state.player_score--;
            }
            state.count += 1
            return state
        }
    })