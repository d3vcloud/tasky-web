<div class="modal-header">
    <h5 class="modal-title mt-0 title-task">
    	<a href="#" class="control-label">Edit title
	    </a>
    </h5>
        <button type="button" class="close" data-dismiss="modal" 
        aria-hidden="true">×</button>
</div>


<div class="modal-body">
		<div class="row">
	        <div class="col-md-4">
	            <div class="form-group">
	                <label class="control-label">
	                	Members
	                </label>
	           	</div>
	        </div>
	        <div class="col-md-4">
	            <div class="form-group">
	                <label class="control-label">
	                	Labels
	                </label>
	           	</div>
	        </div>
	        <div class="col-md-4">
	            <div class="form-group">
	                <label class="control-label">
	                	Due date
	                </label>
	           	</div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-md-12">
	            <div class="form-group">
	                <label class="control-label">
	                	<a href="#" >Edit the description</a>
	                </label>
	                
	           	</div>
	        </div>
	    </div>
		<div class="row">
			<div class="col-md-12">
                <ul class="nav nav-tabs tabs">
                    <li class="active tab">
                        <a href="#main" data-toggle="tab" aria-expanded="false">
                            Main
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#attachments" data-toggle="tab" aria-expanded="false">
                            Attachments
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">
                                    <i class="fa fa-list-ul"></i>  
                                    Checklist
                                </h3>
                                <div class="portlet-widgets">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-purple"><i class="ion-minus-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-purple" class="panel-collapse collapse show">
                                <div class="portlet-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum.
                                </div>
                            </div>
                        </div>
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">
                                	<i class="fa fa-comments-o"></i>  
                                    Activity
                                </h3>
                                <div class="portlet-widgets">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-purple"><i class="ion-minus-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-purple" class="panel-collapse collapse show">
                                <div class="portlet-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="attachments">
                        <div class="row">
					 		<div class="col-md-12">
					 			<form method="POST" class="dropzone" id="mydropzone">
					 				{{ csrf_field() }}
					 				<!--<input type="hidden" name="IdUser" id="IdUser" value>-->
					 			</form>
					 		</div>
 						</div>
                    </div>
                </div>
            </div>
		</div>

</div>
<!--<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" 
    data-dismiss="modal">Close</button>
    
</div>-->
