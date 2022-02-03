import React from 'react';
import ReactDOM from 'react-dom';

function Button(props){
	return <div className="col-3">
            	    <button type="button" className="stylessbutton mt-2" onClick={ props.addProject }><img src="/images/icon-plus.svg" width="24px"/></button>
            	</div>
}

class Projects extends React.Component {
	constructor(){
		super()

		// this.textInput = React.createRef();
	}


	render(){
		let arrayLength = this.props.states.form.projects.length
		return (<React.Fragment>
			<label className="mt-2">Projects</label>
		{
			this.props.states.form.projects.map((value,i)=>{
				return <div className="row mb-1" key={ i }>
							<div className="col-9">
            				    <textarea key={ i } rows='1' id='projects' name='projects[]' defaultValue={value[1]} className='input-element' onChange={ (e)=>this.props.handleInputChanged(e, i) } />
            				</div>
            				{
            					arrayLength==i+1 ? <Button addProject={ this.props.addProject } /> : '' 
            				}
            		   </div>
			})
		}
            </React.Fragment>
            )
	}
}

export default Projects;

