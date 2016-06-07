fromStream('RockPaperScissors')
    .whenAny(function(state, event) {
        linkTo('player-' + event.data.player, event)
    })