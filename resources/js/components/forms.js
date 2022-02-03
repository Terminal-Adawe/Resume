import React from 'react';
import ReactDOM from 'react-dom';
import AddButton from './addButton';
import Projects from './projects';
import Duties from './duties';
import Entries from './entries';


import { CountryDropdown, RegionDropdown, CountryRegionData } from 'react-country-region-selector';


function header(props){
		return <div className="card-header">
            		<h2>Professional Experience</h2>
            		<p>Tell us about your recent jobs</p>
            	</div>
	}

function Inputs(props){
		if(props.tag.inputtype=="text"){
			return <TextInput tag={props.tag} handleInputChanged={ props.handleInputChanged } form={ props.form } />
		} else if (props.tag.inputtype=='date'){
			return <DateInput tag={props.tag} handleInputChanged={ props.handleInputChanged } form={ props.form } />
		} else if (props.tag.inputtype=='dropdown'){
			return <DropdownInput tag={props.tag} handleInputChanged={ props.handleInputChanged } certifications={ props.certifications } form={ props.form } />
		} else if (props.tag.inputtype=='country-dropdown'){
			return <CountryDropdownInput tag={props.tag} countrydropdownChange={ props.countrydropdownChange } country={ props.country } region={ props.region } form={ props.form }/>
		} else if (props.tag.inputtype=='checkbox'){
			return <CheckBox tag={props.tag} handleInputChanged={ props.handleInputChanged } form={ props.form }/>
		} else if (props.tag.inputtype=='' || props.tag.inputtype == "textarea"){
			return <></>
		}
	}

function Label(props){
		return <label htmlFor={props.tag.name}>{props.tag.label}</label>
	}

function FormFieldTemplate(props){
		// console.log("length of array is "+props.tag.length)
		// console.log(props.tag)

		let columnNo = 'col-12';

		switch(props.tag.length){
			case 1:
				columnNo = 'col-12'
				break
			case 2:
				columnNo = 'col-6'
				break
			case 3:
				columnNo = 'col-4'
				break
			default:
				columnNo = 'col-12'
				break;
		}

		return 	<div className="form-group">
                      <div className="row">
                        	{
                          		props.tag.map((formField,i)=>{
                          			return <React.Fragment key={ i }> 
                          			{
                          				formField.map((formFieldz,r)=>{
										return <div key={r} className={columnNo}>
											{ formFieldz.showlabel==1 ? <Label tag={ formFieldz } /> : <Label tag=""/> }
											<Inputs tag={ formFieldz } 
												handleInputChanged={ props.handleInputChanged } 
												country={ props.country } 
												region={ props.region }
												countrydropdownChange={ props.countrydropdownChange }
												certifications={ props.certifications }
												form={ props.form }
												/></div>
                          			})
                          			}
                          			</React.Fragment>
                          			
                          		})
                        	}
                      </div>
            	</div>
	}


function TextInput(props){
		// console.log("Text input field is "+props.form.[props.tag.name])
		return  <input 
					type="text" 
					id="company" 
					placeholder={props.tag.placeholder} 
					name={props.tag.name} 
					defaultValue={ props.form[props.tag.name] }
					className="input-element" 
					onChange={(e)=>props.handleInputChanged(e)}
					required />

	}

function DateInput(props){
	console.log("DField is "+props.tag.name)
	console.log("form is ")
	console.log(props.form)

	console.log("Date input field is "+props.form[props.tag.name])
		return  <input type="date" 
					id={props.tag.name} 
					placeholder={props.tag.placeholder} 
					name={props.tag.name} 
					defaultValue={ props.form[props.tag.name] }
					className="input-element" 
					onChange={(e)=>props.handleInputChanged(e)}
					/>
	}

function DropdownInput(props){
		// console.log("props are ")
		// console.log(props.certifications)
		let certifications = props.certifications
		return <select id={props.tag.name} name={props.tag.name} value={ props.form[props.tag.name] } className="input-element" onChange={(e)=>props.handleInputChanged(e)}>
					<option value=""></option>
					{

						certifications.map((certification,i)=>{
							// console.log(certification)
							return <option key={i} value={ certification.id }>{ certification.certification }</option>
						})
					}
                      </select>
	}

function CountryDropdownInput(props){
		// console.log("setting country to ")
		// console.log(props.form.country)
		return <div>
        		<CountryDropdown
          			value={props.form.country}
          			name={props.tag.name}
          			onChange={(val) => props.countrydropdownChange(val)} />
      			</div>
	}


function CheckBox(props){
		return <label className="form-check-label current_label" style={{paddingLeft: "20px"}}>
                      	<input 
                      		type="checkbox" 
                      		className="form-check-input 
                      		current input-element" 
                      		name="current" 
                      		defaultValue={ props.form[props.tag.name] } 
                      		onChange={(e)=>props.handleInputChanged(e)}
                      		/>
                      		{props.tag.label} 
                      </label>
	}

class Form extends React.Component {
	constructor(){
		super()

		this.state = {
			csrfField: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
			tags: [],
			formtype: document.getElementById("form_type").value,
			name: "",
			value: "",
			country: '', 
			region: '',
			form: {
				session_id: document.querySelector('.session').getAttribute('content'),
				type: document.getElementById("form_type").value,
				school: "",
				certification: "",
				courses: "",
				country: "",
				city: "",
				address: "",
				fromdate: "",
				todate: "",
				projects: [[0,""]],
				company: "",
				role: "",
				duties: [[0,""]],
				current: "",
				authenticated: document.getElementById('authenticated').value
			},
			trigger: true,
			trigger2: true,
			hiddencheck: '',
			certifications: [{ certification: 'none' }]
		}

		this.educationTags = this.educationTags.bind(this)
		this.professionalexperienceTags = this.professionalexperienceTags.bind(this)
		this.handleInputChanged = this.handleInputChanged.bind(this)
		this.countrydropdownChange = this.countrydropdownChange.bind(this)
		this.updateEntries = this.updateEntries.bind(this)
		this.submitForm = this.submitForm.bind(this)
		this.getDetails = this.getDetails.bind(this)
		this.toggleLoader = this.toggleLoader.bind(this)

		this.addDuty = this.addDuty.bind(this)
		this.addProject = this.addProject.bind(this)

		this.formRef = React.createRef();
	}

	componentDidMount(){
		if(document.getElementById('authenticated').value==1){
			console.log("AAuthenticated")

			let form = this.state.form

			form.session_id = document.getElementById('userid').value;
			form.authenticated = document.getElementById('authenticated').value;


			this.setState({
				form: form,
				trigger2: !this.state.trigger2
			})
			
		}

		if(this.state.formtype=="professional"){
			this.professionalexperienceTags()
		} else if (this.state.formtype=="education"){
			this.educationTags()
		}

		this.getDetails()
		
	}

	componentDidUpdate(prevProps, prevState){
    	if(prevState.trigger != this.state.trigger){
    		// console.log("reloading")
    		// console.log(this.state.name)
    		let form = this.state.form

    		if(this.state.name == "projects[]"){
    			// Form switch to trigger when a project id in the form matches the project id
    			// in the props
    			let switche = 0;
    			form.projects.map((project,i)=>{
    				// console.log("The project is ")
    				// console.log(project[0])
    				// console.log(" compared with ")
    				// console.log(this.state.value[0])
    				if(project[0]==this.state.value[0]){
    					project[1] = this.state.value[1]
    					switche = 1
    				}
    			})

    			if(switche==0){
    				// console.log("Projects are ")
    				// console.log(form.projects)
    				// console.log(this.state.value)
    				// console.log(form)
    				// console.log("Length of the project array is ")
    				// console.log(form.projects.length)
    				// const projectArrayLength = form.projects.length
    				// form.projects[0] != "" ? form.projects = [...form.projects, form.projects[0]] : ""
    				// form.projects = [...form.projects, this.props.states.value]
  
    					form.projects = [...form.projects, this.state.value]

    					this.setState({
    						form: form
    					})
    				
    			}
    		} else if(this.state.name == "duties[]"){
    			// Form switch to trigger when a project id in the form matches the project id
    			// in the props
    			let switche = 0;
    			form.duties.map((duty,i)=>{
    				// console.log("The duties is ")
    				// console.log(duty)
    				// console.log(" compared with ")
    				// console.log(this.state.value)
    				if(duty[0]===this.state.value[0]){
    					// console.log("Duty exists in form array ")
    					duty[1] = this.state.value[1]
    					switche = 1
    				}
    			})

    			// Duty was not found already. Will insert in duties array
    			if(switche==0){
    				// console.log("Duty does not exist in form array ")
    				// console.log(form.duties)
    				// console.log("so inserting ")
    				// console.log(this.state.value)
    				// console.log(form)
    				// console.log("Length of the duty array is ")
    				// console.log(form.duties.length)
    				// const dutyArrayLength = form.duties.length
    				// form.projects[0] != "" ? form.projects = [...form.projects, form.projects[0]] : ""
    				// form.projects = [...form.projects, this.props.states.value]
  
    					form.duties = [...form.duties, this.state.value]

    					this.setState({
    						form: form
    					})

    				
    			}
    		} else {
    		console.log("reloading 2...")
    		console.log(form[this.state.name])
    		console.log(" to ")
    			console.log(this.state.value)
    			form[this.state.name] = this.state.value
    			this.setState({
    			form: form
    		})
    		}
    		

    		// console.log("Form is ")
    		// console.log(form)

    		// console.log("updated form is ")
    		// console.log(this.state.form)
    	} 

    	if(prevState.trigger2 != this.state.trigger2){
    		let form = this.state.form

    		form.duties = [[0,""]]
    		form.projects = [[0,""]]

    		this.setState({
    			form: form
    		})
    	}
    }

    toggleLoader(state){
    	console.log('loader is '+state)
    	this.props.loader(state)
    }

    getDetails(){
		axios.get(`/api/get-details/`)
        	.then(response => {
        		// console.log(response)
          this.setState({
            certifications: response.data.certifications,
          })
        })
        .catch(error => {
          // here catch error messages from laravel validator and show them 
          console.log(error)
     	})
	}

	educationTags(){
		const tags = [
			{formField: [[{inputtype:'text',name:'school',placeholder:'Enter name of school',label:'Name of School',showlabel:1}]]},
			{formField: [[{inputtype:'dropdown',name:'certification',placeholder:'',label:'Certification',showlabel:1}]]},
			{formField: [[{inputtype:'text',name:'courses',placeholder:'Enter Courses',label:'Courses',showlabel:1}]]},
			{formField: [[{inputtype:'country-dropdown',name:'country',placeholder:'',label:'Location',showlabel:1}],[{inputtype:'text',name:'city',placeholder:'City',label:'City',showlabel:1}]]},
			{formField: [[{inputtype:'text',name:'address',placeholder:'Address',label:'Address',showlabel:1}]]},
			{formField: [[{inputtype:'date',name:'fromdate',placeholder:'',label:'From',showlabel:1}],[{inputtype:'date',name:'todate',placeholder:'',label:'To',showlabel:1}]]},
			{formField: [[{inputtype:'',name:'',placeholder:'',label:'',showlabel:0}],[{inputtype:'checkbox',name:'current',placeholder:'',label:'I currently school here',showlabel:0}]]},
		]

		this.setState({
			tags: tags
		})
	}

	professionalexperienceTags(){
		const tags = [
			{formField: [[{inputtype: 'text', name:'company',placeholder:'Enter name of Company',label:'Name of Company',showlabel:1}]]},
			{formField: [[{inputtype:'text',name:'role',placeholder:'Enter Your Role In The Company',label:'Role',showlabel:1}]]},
			{formField: [[{inputtype:'country-dropdown',name:'country',placeholder:'',label:'Location',showlabel:1}],[{inputtype:'text',name:'city',placeholder:'City',label:'City',showlabel:1}]]},
			{formField: [[{inputtype:'text',name:'address',placeholder:'Address',label:'Address',showlabel:1}]]},
			{formField: [[{inputtype:'date',name:'fromdate',placeholder:'',label:'From',showlabel:1}],[{inputtype:'date',name:'todate',placeholder:'',label:'To',showlabel:1}]]},
			{formField: [[{inputtype:'',name:'',placeholder:'',label:'',showlabel:0}],[{inputtype:'checkbox',name:'current',placeholder:'',label:'I currently work here',showlabel:0}]]},
		]

		this.setState({
			tags: tags
		})
	}

	handleInputChanged(e, r, form){
		console.log("triggerd")
		// console.log(e.target.name)

		console.log(e.target.value)

		console.log(this.state.trigger)

		// console.log(e.target.type)
		console.log("on count ... ")
		console.log(r)
		// var element = e.target

		let value = e.target.type === 'checkbox' ? e.target.checked : e.target.value;

		if(e.target.name === "projects[]" || e.target.name === "duties[]"){

			value = [r,e.target.value]

		}

		// Setting trigger will cause componentCanUpdate to be called
		this.setState({
			name: e.target.name,
			value: value,
			trigger: !this.state.trigger
		},()=>{
			// element.selectionStart = e.target.selectionStart
   //     	 	element.selectionEnd = e.target.selectionStart
		})
	}

	countrydropdownChange(val){
		console.log('val is ')
		console.log(val)
		this.setState({
			country: val,
			name: "country",
			value: val,
			trigger: !this.state.trigger,
		})
	}

	addDuty(){
		// let txtvalue = this.textInput.current.value
		let form = this.state.form

		const txtvalue = [form.duties.length,""]

		form.duties = [...form.duties, txtvalue]

		this.setState({
			form: form
		})
	}

	addProject(){
		// let txtvalue = this.textInput.current.value

		let form = this.state.form

		const txtvalue = [form.projects.length,""]

		form.projects = [...form.projects, txtvalue]

		this.setState({
			form: form
		})
	}

	updateEntries(form, updateType){
		console.log("Triggered!")
		console.log(JSON.stringify(form))
		this.setState({
			form: form
		},()=>{
			console.log("renewed form is ")
			console.log(JSON.stringify(this.state.form))

			// Check if its an insert and reset duties 
			//and projects arrays in form object
			if(updateType==="insert"){
				this.setState({
					trigger2: !this.state.trigger2
				})
			}
		})
	}

	submitForm(e,value){
		this.setState({
			hiddencheck: value
		},()=>{
			const node = this.formRef.current;

			console.log("submitting form")

			node.submit()
		})

		// node.dispatchEvent(new Event('submit'))
	}



	render(){

		let url = ""
		let action_url = ""
        if(this.state.formtype == "education"){
        	url = '/images/collegeboy.png'
        	action_url = '/saveeducation'
        } else if(this.state.formtype == "professional"){
        	url = '/images/worker.png'
        	action_url = '/saveprofesionaldetails'
        }

        console.log("Form is ")
        console.log(JSON.stringify(this.state.form))

		return (<div className="row">
			<div className="col-lg-2 col-md-2 col-sm-12">
      		</div>
				<div className="col-lg-8 col-md-8 col-sm-12">
        <div className="card input-div-card">
          { this.header }

          <div className="card-body">
            <div className="container-fluid">
            	<div id="message">
            	</div>
              <div className="row">
                <div className="col-8">
                  <form action={ action_url } className="needs-validation" method='post' id="form" ref={this.formRef} noValidate>
                    <input type="hidden" name="_token" value={ this.state.csrfField } />
                    <input type="hidden" value={this.state.hiddencheck} id="hiddencheck" name='hiddencheck' />
                    	{
                    		// serious stuff here
                    		this.state.tags.map((tag,i)=>{
                    				return <FormFieldTemplate key={i} 
                    				 	tag={ tag.formField } 
                    				 	handleInputChanged={ this.handleInputChanged } 
                    				 	countrydropdownChange={ this.countrydropdownChange } 
                    				 	country={ this.state.country } 
                    				 	region={ this.state.region }
                    				 	certifications={ this.state.certifications }
                    				 	form={ this.state.form }
                    				 	/>
                    		
                    		})
                    	}

                    	{ this.state.formtype=="professional" ? <Duties handleInputChanged={ this.handleInputChanged } states={ this.state } addDuty={ this.addDuty } /> : "" }
                    	<Projects handleInputChanged={ this.handleInputChanged } states={ this.state } addProject={ this.addProject } />
                    
                    		


                    	<AddButton states={ this.state } updateEntries={ this.updateEntries } loader={ this.toggleLoader } />
                    <div className="row my-1">
                      <div className="col">
                        <button type="submit" className="stylessbutton" id="next" onClick={ (e)=>this.submitForm(e,'1') }><img src="https://img.icons8.com/ultraviolet/40/000000/circled-chevron-right.png"/> { this.state.formtype=="professional" ? 'Add Education' : 'Add Skill' }</button>
                      </div>
                      <div className="col">
                        <button type="button" className="stylessbutton" onClick={ (e)=>this.submitForm(e,'10') }><img src="https://img.icons8.com/color/48/000000/submit-progress--v1.png"/> View Resume</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div className="col-4" style={{backgroundImage: `url(${url})`, backgroundSize: "cover", backgroundPosition: "center"}}>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

         <div className="col-lg-2 col-md-1 col-sm-1">
        	<div className="container-fluid sticky-top">
          		<div className="row input-div-card">
            		<div className="col-12 mt-2">
                			<Entries states={ this.state } updateEntries={ this.updateEntries } />

            		</div>
          		</div>
        	</div>
      	</div>

      	<div className="col-lg-2 col-md-2 col-sm-12">
        	<a href="https://icons8.com/icon/eLDQ6zxrIhcP/add">Add icon by Icons8</a>
      	</div>
			</div>)
          }

}

export default Form;

