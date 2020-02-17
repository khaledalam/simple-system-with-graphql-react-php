import React, {Component} from 'react';
import axios from 'axios';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

class CreateProduct extends Component {
    constructor() {
        super();
        this.state = { productName: ''}
    }

    handleCreateProduct(e) {
        e.preventDefault();
        axios.post('/api/create/product', {
            productName: this.state.productName,
        })
        .then(response => toast(response.data))
        .catch(error => toast(error.message));
    }

    handleNameChange (e) {
        this.setState({productName: e.target.value});
    }

    render() {
        return(
                <div className="container">
                <form>
                    <div className="form-group">
                        <label htmlFor="productName">Create Product</label>
                        <input type="text" onChange={this.handleNameChange.bind(this)} className="form-control"
                               aria-describedby="productNameHelp" placeholder="Enter product name" />
                        <small id="productNameHelp" className="form-text text-muted">product name length between 2-10</small>
                    </div>
                    <button type="submit" onClick={this.handleCreateProduct.bind(this)} className="btn btn-primary">Create</button>
                </form>
            </div>
        )
    }
}
export default CreateProduct;