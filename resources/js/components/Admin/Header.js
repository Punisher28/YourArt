import React from 'react'
import {Link} from 'react-router-dom'

var routes={
    logout:"{{ route('logout') }}"
}

const Header = () => (
    <nav className="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <Link to='/admin' className="navbar-brand col-sm-3 col-md-2 mr-0">
            YourArt
        </Link>
        <ul className="navbar-nav px-3">
            <li className="nav-item text-nowrap">
                <a className="nav-link" href="/">Back</a>


            </li>
        </ul>
    </nav>
)

export default Header
