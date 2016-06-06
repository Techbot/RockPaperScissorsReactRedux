fromCategory('player')
    .foreachStream()
    .when({
        "$init": function(state, ev) {
            return { count2: 0 };
        },
        "round": function(state, ev) {
            state.count2++;
        }
    })