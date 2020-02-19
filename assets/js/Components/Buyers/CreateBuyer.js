import React, {Component} from 'react';
import axios from 'axios';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

class CreateBuyer extends Component {
    constructor() {
        super();
        this.state = { buyerName: ''};
    }

    handleCreateBuyer(e) {
        e.preventDefault();
        axios.post('./api/create/buyer', {
            buyerName: this.state.buyerName,
        })
        .then(response => toast(response.data))
        .catch(error => toast(error.message));
    }

    handleNameChange (e) {
        this.setState({buyerName: e.target.value});
    }

    render() {
        return(
                <div className="container">
                <form>
                    <div className="form-group">
                        <label>Create Buyer</label>
                        <input type="text" onChange={this.handleNameChange.bind(this)} className="form-control"
                               placeholder="Enter buyer name" />
                    </div>
                    <button type="submit" onClick={this.handleCreateBuyer.bind(this)} className="btn btn-primary">Create</button>
                </form>
            </div>
        )
    }
}
export default CreateBuyer;