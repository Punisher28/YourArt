import React, {Component} from 'react';
import axios from "axios";
import Spinner from "./Spinner";

class TableList extends Component {
    constructor() {
        super();
        this.state = {
            data: [],
            loader: false,
        }
    }

    componentWillMount() {
        axios.get('https://myapp.loc/admin/table_list')
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
                                <th>Table</th>
                                <th>Count Rows</th>

                            </tr>
                            </thead>
                            <tbody>
                            {this.state.data.map((object, index) => (
                                <tr key={index}>
                                    <td>{index}</td>
                                    <td>{object.name}</td>
                                    <td>{object.rows}</td>
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

export default TableList;
