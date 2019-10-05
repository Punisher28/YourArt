import React, {Component} from 'react';

class Spinner extends Component {
    render() {
        return (
            <main role="main" className="d-flex justify-content-center col-md-9 ml-sm-auto col-lg-10 px-4">
                <div className="d-flex align-items-center">
                    <div className="spinner-grow spinn" role="status">
                        <span className="sr-only">Loading...</span>
                    </div>
                </div>
            </main>
        );
    }
}

export default Spinner;