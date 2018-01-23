@extends('layout')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('container')
                  <div class="col-lg-4">
                        <div class="card-box">
                            <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light">Add New</a>
                            <h4 class="text-dark header-title m-t-0">Upcoming</h4>
                            <br>

                            <ul class="sortable-list taskList list-unstyled" id="upcoming">
                                <li class="task-warning" id="task1">
                                    <div class="checkbox checkbox-custom checkbox-single pull-right">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    <div class="m-t-20">
                                        <p class="pull-right m-b-0"><i class="fa fa-clock-o"></i> <span title="15/06/2016 12:56">15/06/2016</span></p>
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="assets/images/users/avatar-1.jpg" alt="task-user" class="thumb-sm rounded-circle m-r-10"> <span class="font-bold">Petey Cruiser</span></a> </p>
                                    </div>
                                </li>
                                <li class="task-success" id="task2">
                                    <div class="checkbox checkbox-custom checkbox-single pull-right">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    Many desktop publishing packages and web page editors now use Lorem.
                                    <div class="m-t-20">
                                        <p class="pull-right m-b-0"><i class="fa fa-clock-o"></i> <span title="15/06/2016 12:56">15/06/2016</span></p>
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="assets/images/users/avatar-2.jpg" alt="task-user" class="thumb-sm rounded-circle m-r-10"> <span class="font-bold">Anna Sthesia</span></a> </p>
                                    </div>
                                </li>
 
                               
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">In Progress</h4>
                            <br>

                            <ul class="sortable-list taskList list-unstyled" id="inprogress">
                                <li id="task9">
                                    <div class="checkbox checkbox-custom checkbox-single pull-right">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    If you are going to use a passage of Lorem Ipsum..
                                    <div class="m-t-20">
                                        <p class="pull-right m-b-0"><i class="fa fa-clock-o"></i> <span title="15/06/2016 12:56">15/06/2016</span></p>
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="assets/images/users/avatar-3.jpg" alt="task-user" class="thumb-sm rounded-circle m-r-10"> <span class="font-bold">Gail Forcewind</span></a> </p>
                                    </div>
                                </li>
                                
                                
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">Completed</h4>
                           <br>

                            <ul class="sortable-list taskList list-unstyled" id="completed">
                                <li class="task-warning" id="task14">
                                    <div class="checkbox checkbox-custom checkbox-single pull-right">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    <div class="m-t-20">
                                        <p class="pull-right m-b-0"><i class="fa fa-clock-o"></i> <span title="15/06/2016 12:56">15/06/2016</span></p>
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="assets/images/users/avatar-1.jpg" alt="task-user" class="thumb-sm rounded-circle m-r-10"> <span class="font-bold">Petey Cruiser</span></a> </p>
                                    </div>
                                </li>
                               
                                
                                
                                <li class="task-danger" id="task18">
                                    <div class="checkbox checkbox-custom checkbox-single pull-right">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="m-t-20">
                                        <p class="pull-right m-b-0"><i class="fa fa-clock-o"></i> <span title="15/06/2016 12:56">15/06/2016</span></p>
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="assets/images/users/avatar-5.jpg" alt="task-user" class="thumb-sm rounded-circle m-r-10"> <span class="font-bold">Rick O'Shea</span></a> </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
@stop

@section('scripts')
	<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

	<script>
		$("#upcoming, #inprogress, #completed").sortable({
                    connectWith: ".taskList",
                    placeholder: 'task-placeholder',
                    forcePlaceholderSize: true,
                    update: function (event, ui) {

                        var todo = $("#todo").sortable("toArray");
                        var inprogress = $("#inprogress").sortable("toArray");
                        var completed = $("#completed").sortable("toArray");
                    }
        }).disableSelection();
	</script>
@stop
