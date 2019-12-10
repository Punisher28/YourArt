import React, {Component} from 'react'
import ReactDOM from 'react-dom'
import Echo from "laravel-echo"
window.io = require('socket.io-client');
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});
class Event extends Component{
    constructor() {
        super();
        this.state = {
            data: [],
            loader: false,
        }
    }

    componentWillMount() {
        console.log('load');
        Echo.channel('channel-id-item')
            .listen('PriceEvent', (e) => {
                console.log(e);
            });
        /*axios.get('https://myapp.loc/admin/users')
            .then(res => {
                this.setState({data: res.data})
                console.log(this.state.data)
                this.setState({loader: true});

            })
            .catch((e) => {
                console.log(e)
            })*/
    }

    render() {
        return (
            <span></span>
        )
    }
}
ReactDOM.render(<Event/>, document.getElementById('event'))
