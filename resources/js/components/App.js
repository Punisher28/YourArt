import React, {Component} from 'react'
import ReactDOM from 'react-dom'
import {BrowserRouter, Route, Switch} from 'react-router-dom'
import Header from './Admin/Header';
import Content from './Admin/Content'

class App extends Component {
    render() {
        return (
            <BrowserRouter>
                    <Header/>
                    <Content/>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App/>, document.getElementById('app'))
