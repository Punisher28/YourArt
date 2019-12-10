import React, {Component} from 'react';
import axios from "axios";
import Spinner from "./Spinner";

class Reports extends Component {
    constructor() {
        super();
        this.state = {
            data: [],
            loader: false,
        }
    }

    componentWillMount() {
        axios.get('https://myapp.loc/admin/reports')
            .then(res => {
                this.setState({data: res.data})
                console.log(this.state.data)
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
                        <table className="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>User_id</th>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            {this.state.data.map((object, index) => (
                                <tr key={index}>
                                    <td>{object.id}</td>
                                    <td>{object.user_id}</td>
                                    <td>{object.name}</td>
                                    <td>{object.description}</td>
                                    <td><img src={'/admin/test/'+object.user_id+'-'+object.src} alt='test'/></td>
                                </tr>
                            ))}

                            </tbody>
                        </table>
                    </div>
                </main>
            ) : (
                <Spinner/>
            )
        );
    }
}

export default Reports;
