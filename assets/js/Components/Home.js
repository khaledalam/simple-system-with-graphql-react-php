import React, {Component} from 'react';
import {Route, Switch,Redirect, Link, withRouter} from 'react-router-dom';
import CreateProduct from "./Products/CreateProduct";
import GetProducts from "./Products/GetProducts";
import GetBuyers from "./Buyers/GetBuyers";
import CreateBuyer from "./Buyers/CreateBuyer";
import CreateOrder from "./Orders/CreateOrder";
import GetOrders from "./Orders/GetOrders";
import {toast, ToastContainer} from "react-toastify";

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
                                    <li><a href="#tabGetOrders" data-toggle="tab">Orders</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div className="panel-body">
                        <div className="tab-content">
                            <ToastContainer position={toast.POSITION.TOP_CENTER} autoClose={1500}/>
                            <div className="tab-pane fade" id="tabCreateProduct">
                                <CreateProduct/>
                            </div>
                            <div className="tab-pane fade" id="tabCreateBuyer">
                                <CreateBuyer/>
                            </div>
                            <div className="tab-pane fade" id="tabCreateOrder">
                                <CreateOrder/>
                            </div>
                            <div className="tab-pane fade" id="tabGetProducts">
                                <GetProducts/>
                            </div>
                            <div className="tab-pane fade" id="tabGetBuyers">
                                <GetBuyers/>
                            </div>
                            <div className="tab-pane fade in active" id="tabGetOrders">
                                <GetOrders/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Home;