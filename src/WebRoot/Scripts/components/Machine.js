// React component
import React from 'react';


var Machine = React.createClass({
    render() {

        var commentNodes = this.props.data.map(function(comment) {
        return (
                <comment author={comment.author} key={comment.id}>
                    {comment.text}
                </comment>
            );
        });

        return (
            <div className="commentList">
                {commentNodes}
            </div>
        );
    }
});

export default Machine;