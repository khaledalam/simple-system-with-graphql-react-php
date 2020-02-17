import React, {Component} from 'react';
import axios from 'axios';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import Select from 'react-select';

class CreateOrder extends Component {
    constructor(props) {
        super(props);
        this.state = { selectedProducts: [], selectedBuyer: '', products: [],  buyers: [], loading: false};
    }

    componentDidMount() {
        this.getBuyers();
        this.getProducts();
    }

    getProducts() {
        axios.get(`/api/get/products`)
            .then(products => { this.setState({ products: products.data, loading: false});})
            .catch(error => console.log(error));
    }

    getBuyers() {
        axios.get(`/api/get/buyers`)
            .then(buyers => { this.setState({ buyers: buyers.data, loading: false});})
            .catch(error => console.log(error));
    }

    handleCreateOrder(e) {
        e.preventDefault();
        const {selectedBuyer, selectedProducts} = this.state;

        axios.post('/api/create/order', {
            buyerID: selectedBuyer,
            productsIDs: selectedProducts,
        })
        .then(response => toast(response.data))
        .catch(error => toast(error.message));
    }

    handleSelectProducts(option){
        const selectedProducts = this.state.selectedProducts;
        let newSelectedProducts = [];
        let existed = false;
        selectedProducts.forEach(product => {
            if (product.id == option.id){
                existed = true;
                return false;
            } else {
                newSelectedProducts.push(product);
            }
        });
        if(!existed){
            newSelectedProducts.push(option);
        }

        this.setState({selectedProducts: newSelectedProducts});
    }

    handleSelectBuyer(buyer) {
        const buyerID = buyer.id;
        this.setState({selectedBuyer: buyerID});
    }

    removeProduct(item){
        let productID = item.target.getAttribute('product-id')
            || item.target.parentNode.getAttribute('product-id');
        let newSelectedProducts = [];
        const selectedProducts = this.state.selectedProducts;
        selectedProducts.forEach(product => {
            if(product.id != productID){
                newSelectedProducts.push(product);
            }
        });
        this.setState({selectedProducts: newSelectedProducts});
    }

    render() {
        const {loading, selectedProducts} = this.state;
        const buyerOptions = [];
        const productsOptions = [];

        this.state.buyers.forEach(item => buyerOptions.push({label: item.name, id: item.id}));
        this.state.products.forEach(item => productsOptions.push({label: item.name, id: item.id}));

        return(
            <div className="container">
            { loading ? (
                <div className={'row text-center'}>
                <span className="fa fa-spin fa-spinner fa-3x"></span>
                </div>
            ) : (
                <div className="container">
                <form>
                    <div className="form-group">
                        <label>Create Order</label>
                        <div className="container">
                            <label>Buyer:</label>
                            <Select
                                options={buyerOptions}
                                onChange={this.handleSelectBuyer.bind(this)}
                            />
                        </div>
                        <hr/>
                        <div className="container">
                            <label>Products:</label>
                            <Select
                                value='products'
                                name="products"
                                placeholder="Add multi products to order"
                                options={productsOptions}
                                onChange={this.handleSelectProducts.bind(this)}
                            />

                            {selectedProducts.length > 0 ?
                                <div className={'text-left'}>
                                    <hr />
                                    <b className={'text-left'}>Selected products: </b>
                                    <ul className="list-group">
                                        {selectedProducts.map(item =>
                                            <li key={item.id} className="list-group-item" product-id={item.id}
                                                onClick={this.removeProduct.bind(this)}>
                                                {item.label} &nbsp;<span className={'fa fa-trash'}></span>
                                            </li>
                                        )}
                                    </ul>
                                </div>
                            : null}

                        </div>
                    </div>
                    <button type="submit" onClick={this.handleCreateOrder.bind(this)} className="btn btn-primary">Create</button>
                </form>
            </div>
            )}
            </div>
        )
    }
}
export default CreateOrder;