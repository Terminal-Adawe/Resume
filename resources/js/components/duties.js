import React from 'react';
import ReactDOM from 'react-dom';

function Button(props){
	return <div className="col-3">
            	    <button type="button" className="stylessbutton mt-2" onClick={ props.addDuty }><img src="/images/icon-plus.svg" width="24px"/></button>
            	</div>
}

class Duties extends React.Component {
	constructor(){
		super()

		this.textInput = React.createRef();
	}


	render(){
		let arrayLength = this.props.states.form.duties.length

		// console.log("all values are ")
		// 	console.log(this.props.states.form.duties)



		return (<React.Fragment>
			<label className="mt-2">Duties</label>
		{
			this.props.states.form.duties.map((value,i)=>{
				// console.log("vaalue is ")
				// console.log(value)
				// console.log("on count ")
				// console.log(i)
				return <div className="row mb-1" key={ i }>
							<div className="col-9">
            				    <textarea rows='1' id='duties' name='duties[]' defaultValue={value[1]} className='input-element' onChange={ (e)=>this.props.handleInputChanged(e, i) } />
            				</div>
            				{
            					arrayLength==i+1 ? <Button addDuty={ this.props.addDuty }/> : '' 
            				}
            		   </div>
			})
		}
            </React.Fragment>
            )
	}
}

export default Duties;

if (document.getElementById('duty')) {
    ReactDOM.render(<Duties />, document.getElementById('duty'));
}
