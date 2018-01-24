@extends('layout')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <style>
        .task-main{
            border-radius: 9px !important;
        }
        .card-tag{
            margin: 2px 0;
            overflow: auto;
            position: relative;
        }
        .card-label{
            height: 16px;
            line-height: 16px;
            padding: 0 8px;
            max-width: 198px;
            float: left;
            font-size: 11px !important;
            font-weight: 600;
            margin: 0 3px 3px 0;
            width: auto;
            border-radius: 3px;
            color: #fff;
            display: block;
        }
        .task-detail{
            cursor: pointer;
        }
        .card-label-red{
            background-color: #eb5a46;
        }
        .card-label-blue{
            background-color: #055a8c;
        }
        .card-label-green{
            background-color: #81c868;
        }
        .card-label-orange{
            background-color: #FFA500;
        }
        .card-label-yellow{
            background-color: #d9b51c;
        }
        .img-task{
            height: 30px !important;
            width: 30px !important;
            border-radius: 60% !important;
        }
    </style>
@stop

@section('container')
                  <div class="col-lg-4">
                        <div class="card-box">
                            <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-toggle="modal" 
                            data-target="#modalAdd">Add New</a>
                            <h4 class="text-dark header-title m-t-0">Upcoming</h4>
                            <br>

                            <ul class="sortable-list taskList list-unstyled" id="upcoming">
                                <li class="task-detail task-main" id="task2">
                                    <div class="pull-right">
                                        <i class="fa fa-trash" style="color: red;
                                        cursor: pointer;"></i>
                                        <label></label>
                                    </div>
                                    <div class="card-tag">
                                        <span class="card-label card-label-red" title="Test">Test</span>
                                        <span class="card-label card-label-blue" title="Diseño">Diseño</span>
                                        <span class="card-label card-label-yellow" title="Mejoras de funcionalidades">Mejoras de funcionalidades</span>
                                    </div>
                                    <span class="task-title">Mejoras en la aplicacion</span>
                                    <div class="m-t-20">
                                        <p class="pull-right m-b-0">
                                            <i class="fa fa-comment-o"></i> 
                                                <span title="0">0</span>
                                        </p>
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="/img/default-user.png" alt="task-user" class="thumb-sm rounded-circle m-r-10 img-task"></a>  
                                        </p>
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
                                    If you are going to use a passage of Lorem Ipsum..
                                    <div class="m-t-20">
                                        
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="/img/default-user.png" alt="task-user" class="thumb-sm rounded-circle m-r-10"> </a> </p>
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
                                <li id="task14">
                                    When an unknown printer took 
                                    <div class="m-t-20">
                                        <p class="m-b-0"><a href="#" class="text-muted"><img src="/img/default-user.png" alt="task-user" class="thumb-sm rounded-circle m-r-10"></a> </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
    <div id="modalAdd" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @include('partials.new-task')
            </div>
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
