import React, {Component} from 'react';
import {Route, Switch,Redirect, Link, withRouter} from 'react-router-dom';
import CreateProduct from "./Products/CreateProduct";
import GetProducts from "./Products/GetProducts";
import GetBuyers from "./Buyers/GetBuyers";
import CreateBuyer from "./Buyers/CreateBuyer";

class Home extends Component {

    render() {
        return (
            <div className="container-fluid">
                <div className="panel with-nav-tabs panel-success">
                    <div className="panel-heading">
                        <ul className="nav nav-tabs">
                            <li className="dropdown">
                                <a href="#" data-toggle="dropdown">Create <span className="caret"></span></a>
                                <ul className="dropdown-menu" role="menu">
                                    <li><a href="#tabCreateProduct" data-toggle="tab">Product</a></li>
                                    <li><a href="#tabCreateBuyer" data-toggle="tab">Buyer</a></li>
                                    <li><a href="#tabCreateOrder" data-toggle="tab">Order</a></li>
                                </ul>
                            </li>
                            <li className="dropdown">
                                <a href="#" data-toggle="dropdown">Retrieve <span className="caret"></span></a>
                                <ul className="dropdown-menu" role="menu">
                                    <li><a href="#tabGetProducts" data-toggle="tab">All Products</a></li>
                                    <li><a href="#tabGetBuyers" data-toggle="tab">All Buyers</a></li>
                                    <li><a href="#tabGetOrders" data-toggle="tab">All Orders</a></li>
                                </ul>
                            </li>
                            <li><a href="#tabGetOrdersByBuyer" data-toggle="tab">Retrieve orders made by a specific buyer</a></li>
                        </ul>
                    </div>
                    <div className="panel-body">
                        <div className="tab-content">
                            <div className="tab-pane fade in active" id="tabCreateProduct">
                                <CreateProduct/>
                            </div>
                            <div className="tab-pane fade" id="tabCreateBuyer">
                                <CreateBuyer/>
                            </div>
                            <div className="tab-pane fade" id="tabCreateOrder">

                            </div>
                            <div className="tab-pane fade" id="tabGetProducts">
                                <GetProducts/>
                            </div>
                            <div className="tab-pane fade" id="tabGetBuyers">
                                <GetBuyers/>
                            </div>
                            <div className="tab-pane fade" id="tabGetOrders">Info 5</div>
                            <div className="tab-pane fade" id="tabGetOrdersByBuyer">Info 5</div>
                        </div>
                    </div>
                </div>

            </div>

            // <div>
            //     <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
            //         <Link className={"navbar-brand"} to={"/"}> Symfony React Project </Link>
            //         <div className="collapse navbar-collapse" id="navbarText">
            //             <ul className="navbar-nav mr-auto">
            //                 <li className="nav-item">
            //                     <Link className={"nav-link"} to={"/products"}> Products </Link>
            //                 </li>
            //             </ul>
            //         </div>
            //     </nav>
            //     <Switch>
            //         <Redirect exact from="/" to="/products" />
            //         <Route path="/products" component={Products} />
            //     </Switch>
            // </div>
        )
    }
}

export default Home;