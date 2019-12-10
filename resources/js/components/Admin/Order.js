import React, {Component} from 'react';
import axios from "axios";
import Spinner from './Spinner'

class Order extends Component {
    constructor() {
        super();
        this.state = {
            data: [],
            loader: false,
        }
    }

    componentWillMount() {
        axios.get('https://myapp.loc/admin/orders')
            .then(async res => {
                await this.setState({data: res.data});
                console.log(this.state.data);
                this.setState({loader: true});
            })
            .catch((e) => {
                console.log(e)
            })
    }

    render() {
        return (

            this.state.loader ? (
                <main role="main" className="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div className="table-responsive">
                        <table className="table table-striped table-hover">
                            <thead className="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Login</th>
                                <th>First_name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Ip</th>
                                <th>Payment</th>
                                <th>Tel</th>
                            </tr>
                            </thead>
                            <tbody>
                            {this.state.data.map((object, index) => (
                                <tr key={index}>
                                    <td>{object.id}</td>
                                    <td>{object.login}</td>
                                    <td>{object.first_name}</td>
                                    <td>{object.surname}</td>
                                    <td>{object.email}</td>
                                    <td>{object.ip_address}</td>
                                    <td>{object.payment_verified}</td>
                                    <td>{object.tel_number}</td>
                                </tr>
                            ))}

                            </tbody>
                        </table>
                    </div>
                </main>
            ) : (
                <Spinner/>
            )
        )
    }
}

export default Order;
