<div class="modal-header">
    <h4 class="modal-title mt-0">New Project</h4>
        <button type="button" class="close" data-dismiss="modal" 
        aria-hidden="true">×</button>
</div>


<div class="modal-body">
	<form id="FormProject" method="POST">
		<input type="hidden" name="Action" id="Action" value="Register">
		<div class="row">
	        <div class="col-md-12">
	            <div class="form-group">
	                <label for="Tipo" class="control-label">Name</label>
	                    <input type="text" class="form-control" id="name" 
	                    name="name" placeholder="Name" required>
	            </div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-md-12">
	            <div class="form-group no-margin">
	                <label for="field-7" class="control-label">Description
	                </label>
	                    <textarea class="form-control" id="description" 
	                    name="description" placeholder="Description" required></textarea>
	           	</div>
	        </div>
	    </div>
	    <button type="button" id="submitProject" class="btn btn-info waves-effect waves-light">Save</button>
	</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" 
    data-dismiss="modal">Close</button>
    
</div>
