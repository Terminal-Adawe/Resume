import React from 'react';
import ReactDOM from 'react-dom';
import AddButton from './addButton';


class Inter extends React.Component {
	constructor(){
		super()

		// this.state={
		// 	values: []
		// }

		this.updateEntries = this.updateEntries.bind(this)
	}

	updateEntries(formData){
		console.log("In Inter ")
		console.log(formData)
		this.props.updateEntries(formData)
	}

	render(){
		return (<React.Fragment>
				<AddButton updateEntries={ this.updateEntries } />
  			</React.Fragment>)
	}
}

export default Inter