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
						<div class="messagepop pop members-popup" style="display: none;">
							<h6 style="margin: 8px 0;">Add Members</h6>
							<button class="close-popup">x</button>
							<hr style="width:260px;margin-top: initial;margin-bottom: 3%;">
							<div class="form-group">
								<div id="members" class="scrollbar" style="margin-top:15px;margin-left:12px;width:auto;height:180px; overflow-y: auto;">
								</div>
							</div>

						</div>
						<button class="popup btn btn-inverse waves-light"
								style="font-size: 10px !important;cursor:pointer;" id="myPopupMembers">
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
						<div class="messagepop pop labels-popup" style="display: none;">
                            <h6 style="margin: 8px 0;">New Label</h6>
							<button class="close-popup">x</button>
                            <hr style="width:260px;margin-top: initial;margin-bottom: 3%;">

								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" id="nameLabel" autofocus class="form-control"
										   style="height: 35px !important;width: 240px !important;
								   margin-left:18px; "/>
								</div>
								<div class="form-group">
									<label>Select Color</label>
									<div style="margin-left:28px;">
										<span data-color="#1abc9c" class="card-label-cyan label-detail label-click"></span>
										<span data-color="#16a085" class="card-label-cyan-two label-detail label-click"></span>
										<span data-color="#27ae60" class="card-label-green label-detail label-click"></span>
										<span data-color="#3498db" class="card-label-blue label-detail label-click"></span>
										<span data-color="#2980b9" class="card-label-blue-two label-detail label-click"></span>
										<span data-color="#9b59b6" class="card-label-purple label-detail label-click"></span>
										<span data-color="#f1c40f" class="card-label-yellow label-detail label-click"></span>
										<span data-color="#e67e22" class="card-label-orange label-detail label-click"></span>
										<span data-color="#eb5a46" class="card-label-red label-detail label-click"></span>
										<span data-color="#95a5a6" class="card-label-gray label-detail label-click"></span>
										<span data-color="#4d4d4d" class="card-label-black label-detail label-click"></span>
									</div>
								</div>
						</div>
						<button class="popup btn btn-inverse waves-light"
								style="font-size: 10px !important;cursor:pointer;" id="myPopup">
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
		<div class="row" id="listMembers">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">
						Members
					</label>
					<div id="membersTask">

					</div>
				</div>
			</div>
		</div>
		<div class="row" id="listLabels">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">
						Labels
					</label>
					<div class="card-tags-detail">

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

                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-purple" class="panel-collapse collapse show">
                                <div class="portlet-body">
                                	<div class="progress progress-md">

                                    </div>
                                    <div id="formCheckList">
										  <div id="add-todo">
										    <i class="fa fa-plus"></i>
										    Add an Item
										  </div>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">
                                	<i class="fa fa-comments-o"></i>  
                                    Activity
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-purple" class="panel-collapse collapse show">
                                <div class="portlet-body">
                                   <div class="media">
                                    <img class="align-self-start rounded mr-3 img-fluid thumb-sm" 
                                    src="{{ Auth::user()->photo  }}"
										 alt="{{ Auth::user()->username }}"/>
	                                    <div class="media-body">
	                                        <textarea class="form-control" 
	                                        placeholder="Write a comment..." 
	                                        style="min-height: 50px !important;" id="comment" required></textarea>
	                                    </div>
                                	</div>
                                	<hr />
			                            <div id="containerActivities" style="height: auto;">
			                                <div class="timeline-2">
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
								<button class="btn btn-danger btn-deleteAll" style="margin-bottom: 15px;cursor:pointer;">
									<i class="fa fa-trash"></i> Delete All
								</button>
								<div class="table-responsive">
									<table id="ListAttachments" class="table">
											<thead>
												<tr>
													<th style="width:10%;">Preview</th>
													<th style="width:50%;">File Name</th>
													<th style="width:15%;">Size</th>
													<th style="width:20%;">Date</th>
													<th style="width:5%;">Actions</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
									</table>	
								</div>
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
