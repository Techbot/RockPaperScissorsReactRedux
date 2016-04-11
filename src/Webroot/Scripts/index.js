
import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider, connect } from 'react-redux';

var messages = ['Rock','Paper','Scissors'];

// React component
class Counter extends React.Component {
  render(){
    const { value,totalScore,machineChoice, onCompareStates, onIncreaseClick } = this.props;
    return (
        <div>
        <span>Player:{value}</span> <span>Computer:{machineChoice}</span>   <span>Score:{totalScore}</span>
    <button onClick={onIncreaseClick}>Increase</button>
        <button onClick={onCompareStates}>Submit</button>
        </div>
  );
  }
}

// Action:
const increaseAction = {type: 'increase'};

const compareAction = {type:'compare'};

// Reducer:
function counter(state={count: 0,score:0,machine:0}, action) {
  let count = state.count;
  let score = state.score;
  let machine = state.machine;
  switch(action.type){
    case 'increase':

      count++;
      if (count>2){
        count=0;
      }

      return {count: count,score: score, machine:machine};

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

// Store:
let store = createStore(counter);

// Map Redux state to component props
function mapStateToProps(state)  {
  return {
    value: messages[state.count],
    machineChoice: messages[state.machine],
    totalScore: [state.score]
  };
}

// Map Redux actions to component props
function mapDispatchToProps(dispatch) {
    return {
        onIncreaseClick: () => dispatch(increaseAction),
        onCompareStates: () => dispatch(compareAction)
}
    ;
}

// Connected Component:
let App = connect(
    mapStateToProps,
    mapDispatchToProps
)(Counter);

ReactDOM.render(
<Provider store={store}>
    <App />
    </Provider>,
    document.getElementById('root')
);
