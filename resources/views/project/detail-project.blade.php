@extends('layout')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <!-- X-editable css -->
    <link type="text/css" href="{{ asset('plugins/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
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
        .input-cus{
            height: 30px;
            padding: 5px 10px;
            font-size: 13px;
            /*line-height: 1.5;*/
            /*border-radius: 6px;*/
            border:none;
            width:90%;
        }
        /*overwrite jquery-ui.css*/
        .ui-corner-all{
            border-bottom-right-radius:inherit;
            border-top-left-radius:inherit;
            border-top-right-radius:inherit;
            border-bottom-left-radius:inherit;
        }
        .ui-widget-content {
            border: inherit;
            background: inherit;
            color: inherit;
        }
        .ui-widget{
            font-size: inherit;
            font-family: inherit;
        }
        /*overwrite background modal*/
        .modal-content { 
            background-color: #f7f7f7 !important;
        }
        /*overwrite css dropzone*/
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
        }
        .dropzone .dz-message {
            font-weight: 400;
            font-size: 25px;
        }
        .dropzone .dz-message {
            text-align: center;
            margin: 2em 0;
        }
    </style>
@stop

@section('container')
                  <div class="col-lg-4">
                        <div class="card-box">
                            <!--data-toggle="modal" 
                            data-target="#modalAdd"-->
                            <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light btn-add-task">
                                <i class="fa fa-plus"></i>
                            </a>
                            <h4 class="text-dark header-title m-t-0">Upcoming</h4>
                            <br>

                            <ul class="sortable-list taskList list-unstyled" id="upcoming">
                                
                                <!--TASKS-->
                                @if(count($tupcoming))
                                    @foreach($tupcoming as $task)
                                        <li class="task-detail task-main">
                                            <div class="pull-right">
                                                <a onclick="remove({{ $task->id }},this);">
                                                    <i class="fa fa-trash" style="color: red;
                                                cursor: pointer;"></i>
                                                </a>
                                                <label></label>
                                            </div>
                                    <!--<div class="card-tag">
                                        <span class="card-label card-label-red" title="Test">Test</span>
                                        <span class="card-label card-label-blue" title="Diseño">Diseño</span>
                                        <span class="card-label card-label-yellow" title="Mejoras de funcionalidades">Mejoras de funcionalidades</span>
                                    </div>-->
                                        <span class="task-title" data-toggle="modal" data-target="#modalDetail">{{ $task->name }}</span>
                                        <!--<div class="m-t-20">
                                            <p class="pull-right m-b-0">
                                                <i class="fa fa-comment-o"></i> 
                                                    <span title="0">0</span>
                                            </p>
                                            <p class="m-b-0"><a href="#" class="text-muted"><img src="/img/default-user.png" alt="task-user" class="thumb-sm rounded-circle m-r-10 img-task"></a>  
                                            </p>
                                        </div>-->
                                        </li>
                                    @endforeach
                                @endif
                                
                               <!--END TASKS-->
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">In Progress</h4>
                            <br>

                            <ul class="sortable-list taskList list-unstyled" id="inprogress">
                                <!--TASKS-->
                                @if(count($tprogress))
                                    @foreach($tprogress as $task)
                                        <li class="task-detail task-main">
                                            <div class="pull-right">
                                                <a onclick="remove({{ $task->id }},this);">
                                                    <i class="fa fa-trash" style="color: red;
                                                cursor: pointer;"></i>
                                                </a>
                                                <label></label>
                                            </div>
                                            <span class="task-title" data-toggle="modal" data-target="#modalDetail">
                                                {{ $task->name }}
                                            </span>
                                        </li>
                                    @endforeach
                                @endif
                                <!--END TASKS-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">Completed</h4>
                           <br>

                            <ul class="sortable-list taskList list-unstyled" id="completed">
                                <!--TASKS-->
                                @if(count($tcompleted))
                                    @foreach($tcompleted as $task)
                                        <li class="task-detail task-main">
                                            <div class="pull-right">
                                               <a onclick="remove({{ $task->id }},this);">
                                                    <i class="fa fa-trash" style="color: red;
                                                cursor: pointer;"></i>
                                                </a>
                                                <label></label>
                                            </div>
                                            <span class="task-title" data-toggle="modal" data-target="#modalDetail">
                                                {{ $task->name }}
                                            </span>
                                        </li>
                                    @endforeach
                                @endif
                                <!--END TASKS-->
                            </ul>
                        </div>
                    </div>
    <div id="modalDetail" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @include('partials.detail-task')
            </div>
        </div>
    </div>
@stop

@section('scripts')
	<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/x-editable/js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ asset('js/assets/task.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
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

        newTask();

        //Dropzone configuration
        Dropzone.autoDiscover = false;
        $("#mydropzone").dropzone({
            //paramName: "file",
            url: "usuario/foto",
            addRemoveLinks : true,
            acceptedFiles: 'image/*',
            maxFilesize: 4.5,
            maxFiles:1,
            dictResponseError: 'Error al subir foto!',
            success:function(file,data){
              /*if(data == "Subido") mensajePersonalizado('Subir Foto','Imagen Subida Correctamente','success',3000);
              else mensajePersonalizado('Error','Ha Ocurrido un error','error',3000);

              Dropzone.forElement("#mydropzone").removeAllFiles(true);*/
            }
        });

	</script>
@stop


