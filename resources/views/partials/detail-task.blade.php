<div class="modal-header">
    <h5 class="modal-title mt-0">
    	<a href="#" class="control-label" id="titleTask" data-pk="0" data-type="text" data-placement="right">Edit Title</a>
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
	                <div class="add-members">
	                	<button class="btn btn-inverse waves-effect waves-light" 
	                	style="font-size: 10px !important;">
	                		<i class="fa fa-plus"></i>
	                	</button>
	                </div>
	           	</div>
	        </div>
	        <div class="col-md-4">
	            <div class="form-group">
	                <label class="control-label">
						Labels
	                </label>
	                <div class="add-labels">
	                	<button class="btn btn-inverse waves-effect waves-light" 
	                	style="font-size: 10px !important;">
	                		<i class="fa fa-plus"></i>
	                	</button>
	                </div>
	           	</div>
	        </div>
	        <div class="col-md-4">
	            <div class="form-group">
	               
	                <div class="form-group">
	               	 	<label class="control-label">
		                	Due date
		                </label>
		                <div class="form-group">
			                <div class="input-group date form_datetime" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" name="dueDate" id="dueDate" 
			                    size="16" type="text" value="" readonly 
			                    style="cursor: not-allowed !important;">
			                    <span class="input-group-addon">
			                    	<a href="#"><i class="fa fa-calendar"></i></a>
			                    </span>
			                </div>
							<input type="hidden" id="dtp_input2" value="" /><br/>
            			</div>
            		</div>
	           	</div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-md-12">
	            <div class="form-group">
	            	<label class="control-label">
	                	Description
					</label>
	                <div class="control-label">
	                	<a href="#" id="descriptionTask" data-pk="0" data-type="textarea">Edit Description</a>
	                </div>
	                
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
                        <a href="#upload" data-toggle="tab" aria-expanded="false">
                            Upload
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
                                	<div class="progress progress-md">
                                        <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" 
                                        style="width: 20%;font-size:12.8px;">
                                            20%
                                        </div>
                                    </div>
                                    <form id="formCheckList">
										<div id="containerST">

										</div>
										 <!-- <span class="todo-wrap">
										    <input type="checkbox" id="1" checked/>
										    <label for="1" class="todo">
										      <i class="fa fa-check"></i>
										      Have a good idea
										    </label>
										    <span class="delete-item" title="remove">
										      <i class="fa fa-times-circle"></i>
										    </span>
										  </span>-->
										  <div id="add-todo">
										    <i class="fa fa-plus"></i>
										    Add an Item
										  </div>
									</form>
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
                                   <div class="media">
                                    <img class="align-self-start rounded mr-3 img-fluid thumb-sm" 
                                    src="/img/default-user.png" alt="Name User" 
                                     />
	                                    <div class="media-body">
	                                        <textarea class="form-control" 
	                                        placeholder="Write a comment..." 
	                                        style="min-height: 50px !important;" required></textarea>
	                                    </div>
                                	</div>
                                	<hr />
			                            <div id="containerActivities" 
			                            style="height: auto;">
			                                <div class="timeline-2">
			                                    <div class="time-item">
			                                        <div class="item-info">
			                                            <div class="text-muted"><small>5 minutes ago</small></div>
			                                            <p>
			                                            	<strong>
				                                            	<img class="align-self-start rounded mr-3 img-fluid thumb-sm" 
	                                    						src="/img/default-user.png" alt="Name User" />
                                    							<a href="#" class="text-info">John Doe </a>
                                    						</strong>
                                    						Uploaded 2 new photos
                                    					</p>
			                                        </div>
			                                    </div>
			                                    <div class="time-item">
			                                        <div class="item-info">
			                                            <div class="text-muted"><small>30 minutes ago</small></div>
			                                            <p>
			                                            	<img class="align-self-start rounded mr-3 img-fluid thumb-sm" 
	                                    						src="/img/default-user.png" alt="Name User" />
			                                            	<a href="#" class="text-info">Lorem</a> commented your post.</p>
			                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="upload">
                        <div class="row">
					 		<div class="col-md-12">
					 			<form method="POST" class="dropzone" id="mydropzone">
					 				{{ csrf_field() }}
					 			</form>
					 		</div>
 						</div>
					</div>
					<div class="tab-pane" id="attachments">
                        <div class="row">
					 		<div class="col-md-12">
					 			
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
