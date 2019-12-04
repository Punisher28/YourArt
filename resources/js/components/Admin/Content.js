import React, {Component} from 'react';
import {Route, Switch} from 'react-router-dom';
import Sidebar from './Sidebar';
import Home from './Dash';
import Order from './Order';
import Products from './Products';
import Users from './Users'
import Reports from './Reports'
import Tables from './TableList'
import Settings from './Settings'



class Content extends Component {


    render() {
        return (
            <div className="container-fluid">
                <div className="row">
                    <Sidebar/>
                    <Switch>
                        <Route path="/admin/" exact component={Home}/>
                        <Route path="/admin/order" component={Order}/>
                        <Route path="/admin/products" component={Products}/>
                        <Route path="/admin/users" component={Users}/>
                        <Route path="/admin/reports" component={Reports}/>
                        <Route path="/admin/tables" component={Tables}/>
                        <Route path="/admin/settings" component={Settings}/>
                    </Switch>
                </div>
            </div>
        );
    }
}

export default Content;