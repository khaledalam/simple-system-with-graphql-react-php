import React from 'react';
import ReactDOM from 'react-dom';
import Home from "./Components/Home";


class App extends React.Component {
    constructor() {
        super();

        this.state = {
            entries: []
        };
    }

    componentDidMount() {

    }

    render() {
        return <Home/>;
    }
}

ReactDOM.render(<App />, document.getElementById('root'));