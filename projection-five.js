fromStream("RockPaperScissors")
    .when({
        $init: function() {
            return {
             player_rocks :10,
             player_papers:10,
             player_scissors :10,
             machine_rocks:10,
             machine_papers :10,
             machine_scissors :10,
             machineChoice :10,
             myChoice:1,
             count: 0
            }
        },
        "round": function(state, event) {

            switch (event.player) {
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

            switch (event.machine) {
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
            state.count += 1
            return state
        }
    })