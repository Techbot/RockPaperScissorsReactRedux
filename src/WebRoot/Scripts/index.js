import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider, connect } from 'react-redux';
import AppContainer from './components/AppContainer.js';
import counter from './reducers/counter';


import Counter from './components/App.js';
import * as actions from './actions/index';

var messages = ['Rock','Paper','Scissors'];

var data = [
    {id: 1, author: "Pete Hunt", text: "This is one comment"},
    {id: 2, author: "Jordan Walke", text: "This is *another* comment"}
];

// Action:
const increaseAction = {type: 'increase'};

const compareAction = {type:'compare'};

// Store:
let store = createStore(counter);

// Map Redux state to component props
function mapStateToProps(state)  {
  return {
    value: messages[state.count],
    machineChoice: messages[state.machine],
    totalScore: state.score,
data:data
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
<Provider store={store} data={data} >
    <App />
    </Provider>,
    document.getElementById('root')
);
