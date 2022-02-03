import React from 'react';
import ReactDOM from 'react-dom';


function Modal(props) {
		return (<React.Fragment>
				<div className="modal" id="deleteModal">
  <div className="modal-dialog">
    <div className="modal-content">


      <div className="modal-body">
        Are you sure you want to delete {}?
      </div>

      <div className="modal-footer">
        <button type="button" className="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
  			</React.Fragment>)
	
}

export default Modal