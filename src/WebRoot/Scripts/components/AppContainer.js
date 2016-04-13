/**
 * Created by rob on 01/04/2016.
 */
// React component
import React from 'react';
import Counter from '../components/App.js';
import AgeBox from '../components/AgeBox.js';

export default class AppContainer extends React.Component {

    render(){
        const { value, value2, onIncreaseClick, onDecreaseClick, onAttackClick} = this.props;

        return (
            <div>
                <span>nnn</span>
                <Counter {...this.props}/>
                <AgeBox />

            </div>
        );

    }
}

