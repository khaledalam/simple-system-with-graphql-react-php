import React, {Component} from 'react';
import axios from 'axios';

class API {

    async getProducts(useCache = false) {
        // if (useCache && this.state.products.length > 1)
        //     return this.state.products;

        await axios.get(`/api/get/products`).then(products => {
            // this.setState({ products: products.data});
            return products.data;
        }).catch(error => {
            console.log(error);
            return null;
        })
    }

    async getBuyers(useCache = false) {
        // if (useCache && this.state.buyers.length > 1)
        //     return this.state.buyers;

        await axios.get(`/api/get/buyers`).then(buyers => {
            // this.setState({buyers: buyers.data, loading: false});
            return buyers.data;
        }).catch(error => {
            console.log(error);
            return null;
        })
    }

    async getOrders(useCache = false) {
        // if (useCache && this.state.orders.length > 1)
        //     return this.state.orders;

        await axios.get(`/api/get/orders`).then(orders => {
            // this.setState({orders: orders.data, loading: false});
            return orders.data;
        }).catch(error => {
            console.log(error);
            return null;
        })
    }
}
export default API;