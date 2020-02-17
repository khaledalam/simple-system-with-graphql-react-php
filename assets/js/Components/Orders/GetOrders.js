import React, {Component} from 'react';
import axios from 'axios';
import Select from "react-select";

class GetOrders extends Component {
    constructor() {
        super();
        this.state = { orders: [], buyers: [], selectedUser: '', filterByBuyer: false, lastCount: 5, loading: true};
    }

    componentDidMount() {
        this.getOrders();
        this.getBuyers();
    }

    getOrders(byBuyer = -1) {
        console.log(byBuyer);
        axios.post(`/api/get/orders`, {
            filterByBuyer: byBuyer
        }).then(orders => {
                console.log(orders.data);
                this.setState({orders: orders.data, loading: false});})
            .catch(error => console.log(error));
    }

    getBuyers() {
        axios.get(`/api/get/buyers`)
            .then(buyers => { this.setState({ buyers: buyers.data, loading: false});})
            .catch(error => console.log(error));
    }

    handleChangeLimit(increase) {
        let newLimit = this.state.lastCount + (increase ? 5 : -5);
        this.setState({ lastCount: newLimit});
    }

    handleSelectBuyer(buyer) {
        const buyerID = buyer.id;
        this.getOrders(buyerID);
        this.setState({filterByBuyer: true, selectedUser: buyer.name});
    }

    handleRemoveFilter() {
        this.getOrders();
        this.setState({filterByBuyer: false, selectedUser: null});
    }

    render() {
        const { orders, loading, lastCount, filterByBuyer, selectedUser } = this.state;
        const buyerOptions = [];

        this.state.buyers.forEach(item => buyerOptions.push({label: item.name, id: item.id}));

        return(
            <div className="container">
                {loading ? (
                    <div className={'row text-center'}>
                        <span className="fa fa-spin fa-spinner fa-3x"></span>
                    </div>
                ) : (
                    <div className={'row'}>

                        {filterByBuyer
                            ? <label>Orders of Buyer <span className={'btn btn-sm btn-danger'}
                                      onClick={this.handleRemoveFilter.bind(this)}> remove filter X</span></label>
                            : <label>All Orders</label>}
                        <Select
                            value={selectedUser}
                            options={buyerOptions}
                            onChange={this.handleSelectBuyer.bind(this)}
                        />

                        <table className="table">
                            <thead className="thead-light">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Buyer</th>
                                <th scope="col">Products</th>
                            </tr>
                            </thead>
                            {orders.length > 0 ?
                                (<tbody>
                                    { orders.slice(0, lastCount).map( order =>
                                            <tr key={order.orderID}>
                                                <th scope="row">{order.orderID}</th>
                                                <td>{order.buyerName}</td>
                                                <td>{order.products.map(product =>
                                                    <span key={product.productID} style={{marginRight: 5}} className={'badge'}>{product.productName} </span>
                                                )}</td>
                                            </tr>
                                    )}
                            </tbody>)
                                : (<tbody><tr><td>No Orders!</td></tr></tbody>)}
                        </table>
                        <div className={'text-center'}>
                            {lastCount < orders.length ?
                                (
                                    <button className={'btn btn-sm btn-info'} onClick={this.handleChangeLimit.bind(this, true)}>Show More <span className={'fa fa-arrow-down fa-1x'}></span> </button>
                                )
                                : null
                            }
                            <span>&nbsp;</span>
                            {lastCount > 5 ?
                                (
                                    <button className={'btn btn-sm btn-danger'} onClick={this.handleChangeLimit.bind(this, false)}>Show Less <span className={'fa fa-arrow-up fa-1x'}></span></button>
                                ) : null
                            }
                        </div>
                    </div>
                )}
            </div>
        )
    }
}
export default GetOrders;