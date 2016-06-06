fromStream('RockPaperScissors')
    .whenAny(function(state, ev) {
        linkTo('player-' + ev.data.id, ev)
    })