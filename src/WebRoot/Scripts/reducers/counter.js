// Reducer:
function counter(state={count: 0,score:0,machine:0}, action) {
    let count = state.count;
    let score = state.score;
    let machine = state.machine;
    let data4 =state.data4;

    switch(action.type){
        case 'increase':

            count++;
            if (count>2){
                count=0;
            }

            return {count: count,score: score, machine:machine, data4:data4};

        case 'compare':

            if (count>machine || (count==0&&machine==2)){
                score++;
                machine =Math.floor(Math.random()*3);
            }
            if (count<machine || (machine==0&&count==2)){
                score--;
                machine =Math.floor(Math.random()*3);
            }

            if (count==machine){

                machine =Math.floor(Math.random()*3);
            }

            $.ajax({
                url: "app_dev.php/write/1"
            }).done(function() {

                $( this ).addClass( "done" );

            });

            return {count: count,score: score, machine:machine};

        default:
            return state;
    }
}

export default counter;