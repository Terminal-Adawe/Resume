import React from 'react';
import ReactDOM from 'react-dom';
import Loader from './Loader'
import Modal from './modal'



class Entries extends React.Component {
	constructor(){
		super()

		this.state={
			entries: [],
			responsibilities: [],
			projects: [],
			session: "",
			type: "",
			deleteEntry: "",
			loader: true,
			authenticated: ''
		}

		this.populate = this.populate.bind(this)

	}

	componentDidMount(){
		console.log("mounted "+this.props.states.form.type)
		this.setState({
			session: this.props.states.form.session_id,
			type: this.props.states.form.type,
			authenticated: this.props.states.form.authenticated
		})

		console.log("mounted 2 "+this.state.type)

		this.getEntries(this.props.states.form.authenticated, this.props.states.form.session_id, this.props.states.form.type)	
	}

	componentDidUpdate(prevProps, prevState){
    	if(prevProps.states.trigger2 != this.props.states.trigger2){
    		console.log("reloading props")
    		this.setState({
    			loader: true
    		},()=>{
    			this.getEntries(this.props.states.form.authenticated, this.props.states.form.session_id, this.state.type)
    		})
    	}
    }

	getEntries(authenticated, session, type){
		console.log("authenticated:")
		console.log(authenticated)

		console.log("session: ");
		console.log(session);

		console.log("type: ");
		console.log(type);

		axios.get(`/api/get-entries/${ authenticated }&${ session }&${ type }`)
        	.then(response => {
        		console.log(response)
          this.setState({
            entries: response.data.entries,
            responsibilities: response.data.entries_responsibilities,
            projects: response.data.entries_projects,
            loader: false
          })
        })
        .catch(error => {
          // here catch error messages from laravel validator and show them 
          console.log(error)
     	})
	}


	populate(entry){
		var inputs = document.querySelectorAll('.input-element')

		console.log(this.props.states.form)

		var form = this.props.states.form

		// console.log("entry clicked is ")
		// console.log(entry)
		// console.log("and form is ")
		// console.log(JSON.stringify(form))

		inputs.forEach((input,i)=>{
			
			switch(input.name){
				case "school":
					form.school = entry.school
					input.value = entry.school
					break;
				case "certification":
					form.certification = entry.certification_id
					input.value = entry.certification_id
					break;
				case "courses":
					form.courses = entry.courses
					input.value = entry.courses
					break;
				case "address":
					form.address = entry.address
					input.value = entry.address
					break;
				case "fromdate":
					form.fromdate = entry.date_started
					input.value = entry.date_started
					break;
				case "todate":
					form.todate = entry.date_ended
					input.value = entry.date_ended
					break;
				case "projects[]":
					let projects = []
					this.state.projects.filter(project=>project.entryid==entry.eid).map((project,i)=>{

						projects = [...projects, [projects.length,project.project]]

						form.projects = projects
					})

					// console.log("Length of projects is ")
					// console.log(projects.length)
					break;
				case "duties[]":
					let duties = []

					// console.log("In duties")
					this.state.responsibilities.filter(responsibility=>responsibility.entryid==entry.eid).map((duty,i)=>{
						// console.log("duties are ")
						// console.log(form.duties)
						// console.log("before array injection ... ")
						duties = [...duties, [duties.length,duty.duty]]
						form.duties = duties
						// console.log(duties)
						// console.log(form.duties)
						// console.log(form.company)

						// console.log(" || Parent || ")
						// console.log(JSON.stringify(form))
					})
					break;
				case "city":
					form.city = entry.city
					input.value = entry.city
					break;
				case "country":
					console.log("country...")
					console.log(input.value)
					form.country = entry.country
					input.value = entry.country
					break;
				case "company":
					form.company = entry.company
					input.value = entry.company
					break;
				case "role":
					form.role = entry.role
					input.value = entry.role
					break;
				default:
					form.country = entry.country
					break;

			}
		})

		console.log("sending form ")
		console.log(form)

		this.props.updateEntries(form,"populate")
	}

	render(){

		return (<React.Fragment>
				<div className="row">
					<div className="col-12">
              			Entries
              		</div>
            	</div>

        {
            this.state.loader ? <div className="row"><div className="mx-auto"><Loader /></div></div> :
  
			this.state.entries.map((entry,i)=>{
				return <div className="row" key={ i }><div className="card text-white mt-1 entry-card" style={{backgroundColor: "#85c1e9"}} onClick={ ()=>this.populate(entry) } value={ entry }>
          <input type="hidden" name="current_value" className="current_value" value={ entry.eid } />
          <div className="entry-card-relative">
          	<div className="card-body">{  this.state.type == "education" ? entry.school : entry.company }</div>
          </div>
          <div className="entry-card-absolute" data-toggle="modal" data-target="#deleteModal">Delete <br/>record</div>
        </div>
        </div>
			})
		}
			<Modal entry={this.state.deleteEntry} />
            </React.Fragment>)
	}

}

export default Entries;

if (document.getElementById('entries')) {
    ReactDOM.render(<Entries />, document.getElementById('entries'));
}