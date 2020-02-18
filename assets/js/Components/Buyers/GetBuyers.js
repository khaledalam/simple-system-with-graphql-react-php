import React, {Component} from 'react';
import axios from 'axios';

class GetBuyers extends Component {
    constructor() {
        super();
        this.state = { buyers: [], lastCount: 5, loading: true};
    }

    componentDidMount() {
        this.getBuyers();
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

    render() {
        const { buyers, loading, lastCount } = this.state;

        return(
            <div className="container">
                {loading ? (
                    <div className={'row text-center'}>
                        <span className="fa fa-spin fa-spinner fa-3x"></span>
                    </div>
                ) : (
                    <div className={'row'}>
                        <label>All Buyers</label>
                        <span style={{margin: 10, padding: 5}} className={'fa fa-refresh btn btn-xs btn-info'} onClick={this.componentDidMount.bind(this)}>
                            <small> Refresh</small>
                        </span>
                        <table className="table">
                            <thead className="thead-light">
                            <tr>
                                <th scope="col">Buyer ID</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            {buyers.length > 0
                                ? ( <tbody>
                                    { buyers.slice(0, lastCount).map( buyer =>
                                        <tr key={buyer.id}>
                                            <th scope="row">{buyer.id}</th>
                                            <td>{buyer.name}</td>
                                        </tr>
                                    )}
                                    </tbody>)
                                : (<tbody><tr><td><span>No Buyers!</span></td></tr></tbody>)}

                        </table>
                        <div className={'text-center'}>
                            {lastCount < buyers.length
                                ? (<button className={'btn btn-sm btn-info'} onClick={this.handleChangeLimit.bind(this, true)}>Show More <span className={'fa fa-arrow-down fa-1x'}></span> </button>)
                                : null
                            }
                            <span>&nbsp;</span>
                            {lastCount > 5
                                ? (<button className={'btn btn-sm btn-danger'} onClick={this.handleChangeLimit.bind(this, false)}>Show Less <span className={'fa fa-arrow-up fa-1x'}></span></button>)
                                : null
                            }
                        </div>
                    </div>
                )}
            </div>
        )
    }
}
export default GetBuyers;