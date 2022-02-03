import React from 'react';
import ReactDOM from 'react-dom';

function maxDateCal(){
        var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
    
        return maxDate;
    }


class AddButton extends React.Component {
	constructor(){
		super()

		this.state={
			type: "",
			description: "",
		}

		this.getFormData = this.getFormData.bind(this)
		this.insertData = this.insertData.bind(this)
	}

	componentDidMount(){

		if(this.props.states.formtype=="education"){
			this.setState({
				type: this.props.states.formtype,
				description: "Education",
			})
		} else if (this.props.states.formtype=="professional"){
			this.setState({
				type: this.props.states.formtype,
				description: "Professional Experience"
			})
		}
	}

	getFormData(){		

		console.log("Info sent is ")
		console.log(this.props.states.form)

        this.props.loader(true)
		this.insertData(this.props.states.form)


	}

	insertData(formData){
		axios.post('/api/add-entry',formData)
      .then(response => {
        console.log(response)
        if(response.data.code == "000"){
            this.props.loader(false)

            console.log("Max date calculated is "+maxDateCal())
            document.getElementById('fromdate').setAttribute('max',maxDateCal())
            document.getElementById('todate').setAttribute('max',maxDateCal())
            document.getElementById('todate').removeAttribute('min')

        	console.log(response.data.message)
        	console.log("Set everything to empty")
        	var inputs = document.querySelectorAll('.input-element')
        	let count_p = 0 
        	let count_d = 0

            let form = formData

        	inputs.forEach((input,i)=>{
        		if(input.name == "certification" || input.name == "country" || input.name == "country" || input.name == "city"){

        		} else {
        			if(input.name=="projects[]"){
        				// Remove additional text areas
        				if(count_p>0){
        					input.remove()
        				}
        				count_p++
        			}

        			if(input.name=="duties[]"){
        				// Remove additional text areas
        				if(count_d>0){
        					input.remove()
        				}
        				count_d++
        			}
        			input.value = ""
        		}

                switch(input.name){
                    case "school":
                        form.school = ""
                        break;
                    case "certification":
                        form.certification = ""
                        break;
                    case "courses":
                        form.courses = ""
                        break;
                    case "address":
                        form.address = ""
                        break;
                    case "fromdate":
                        form.fromdate = ""
                        break;
                    case "todate":
                        form.todate = ""
                        break;
                    case "projects[]":
        
                        form.projects = []
                        break;
                    case "duties[]":
                        form.duties = []
                        console.log("In duties")
                        break;
                    case "city":
                        form.city = input.value
                        break;
                    case "country":
                        console.log("country...")
                        console.log(input.value)
                        form.country = input.value
                        break;
                    case "company":
                        form.company = ""
                        break;
                    case "role":
                        form.role = ""
                        break;
                    default:
                        form.country = input.value
                        break;

                }

            this.props.updateEntries(formData,"insert")
        	})

            document.getElementById('message').innerHTML = ""
        } else {
            this.props.loader(false)
        	console.log(response.data.message)
        	document.getElementById('message').innerHTML = response.data.message
        }

      })
      .catch(error => {
        console.log(error)
      })
	}

	render(){

		return (<button type="button" className="stylessbutton addtab my-4" id="add" onClick={this.getFormData}><img src="https://img.icons8.com/officel/40/000000/add.png"/> Add { this.state.description }</button>
            )
	}
}

export default AddButton;

