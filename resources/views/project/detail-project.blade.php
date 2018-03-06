@extends('layout')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link type="text/css"  href="{{ asset('plugins/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailProject.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checklist.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
    <style>
        .img-customize{
            height: 23px !important;
            width: 23px !important;
        }
        .item-info-customize{
            margin-bottom: 2px !important;
        }
        /* Color Picker */
        .picker {
            border-radius: 5px;
            width: 36px;
            height: 36px;
            cursor: pointer;
            -webkit-transition: all linear .2s;
            -moz-transition: all linear .2s;
            -ms-transition: all linear .2s;
            -o-transition: all linear .2s;
            transition: all linear .2s;
            border: thin solid #eee;
        }
        .picker:hover {
            transform: scale(1.1);
        }
        .container-members {
            cursor: pointer;
            border-radius: 5px;
            height: 34px;
            width: 230px;
        }
        .container-members:hover {
            background-color: #4c5667;
            color: #fff;
            font-weight: 500;
        }
        .selected {
            color:red;
        }
        .deselected {
            color:#797979;
        }

        /*.p-customize{
            margin-bottom: 5px !important;
        }*/
    </style>
    <!--Footable
    <link href="../plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="../plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />-->
    
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

                            <ul class="sortable-list taskList list-unstyled main-container" id="upcoming">
                                
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
                                            @if(count($task->task_labels()->get()))
                                                <div class="card-tags ct{{ $task->id }}" >
                                                @foreach($task->task_labels()->get() as $label)
                                                        <span class="card-label" style="background-color: {{ $label->color }}"
                                                              title="{{ $label->name }}">{{ $label->name }}</span>
                                                @endforeach
                                                </div>
                                            @endif
                                        <a class="task-title btn-task-detail" id="task{{ $task->id }}"
                                           data-toggle="modal" data-target="#modalDetail"
                                        data-url="{{ route('app.details.task', $task->id ) }}">
                                            {{ $task->name }}
                                        </a>
                                        <div class="m-t-20" style="margin-top: 7px !important;">
                                            <p class="pull-right m-b-0">
                                                <i class="fa fa-comment-o"></i> 
                                                    <span id="comment{{ $task->id }}">
                                                        {{ $task->task_activities()->where('type','message')->count() }}
                                                    </span>
                                            </p>
                                            <p class="pull-right m-b-0" style="margin:0px 25px;">
                                                <i class="fa fa-paperclip"></i>
                                                <span id="attachment{{ $task->id }}">
                                                   {{ $task->task_attachments()->count() }}
                                                </span>
                                            </p>
                                            <p class="pull-right m-b-0" style="margin:0px 25px;">
                                                <?php
                                                    $result = 0;
                                                    if($task->task_subtasks()->count() != 0){
                                                        $result =  ($task->task_subtasks()->where('isComplete',1)->count() /
                                                                $task->task_subtasks()->count()) * 100;
                                                    }
                                                ?>
                                                <span id="percent{{ $task->id }}">
                                                   {{ round($result) }}
                                                </span>
                                                <i class="fa fa-percent"></i>

                                            </p>
                                            <p class="m-b-0 text-muted mt{{ $task->id }}">
                                            @if(count($task->users()->get()))
                                                @foreach($task->users()->get() as $user)
                                                   <img id="memberTV{{ $user->id }}{{ $task->id }}" data-task-id="{{ $task->id }}" data-id="{{ $user->id }}" src="{{ $user->photo }}" alt="{{ $user->last_name }}"
                                                             class="thumb-sm rounded-circle img-task task-user">
                                                @endforeach
                                            @endif
                                            </p>
                                        </div>
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

                            <ul class="sortable-list taskList list-unstyled main-container" id="inprogress">
                                <!--TASKS-->
                                @if(count($tprogress))
                                    @foreach($tprogress as $task1)
                                        <li class="task-detail task-main">
                                            <div class="pull-right">
                                                <a onclick="remove({{ $task1->id }},this);">
                                                    <i class="fa fa-trash" style="color: red;
                                                cursor: pointer;"></i>
                                                </a>
                                                <label></label>
                                            </div>
                                            @if(count($task1->task_labels()->get()))
                                                <div class="card-tags ct{{ $task1->id }}" >
                                                    @foreach($task1->task_labels()->get() as $label)
                                                        <span class="card-label" style="background-color: {{ $label->color }}"
                                                              title="{{ $label->name }}">{{ $label->name }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <a class="task-title btn-task-detail" id="task{{ $task1->id }}"
                                               data-toggle="modal" data-target="#modalDetail"
                                               data-url="{{ route('app.details.task', $task1->id ) }}">
                                                {{ $task1->name }}
                                            </a>
                                            <div class="m-t-20" style="margin-top: 7px !important;">
                                                <p class="pull-right m-b-0">
                                                    <i class="fa fa-comment-o"></i>
                                                    <span id="comment{{ $task1->id }}">
                                                        {{ $task1->task_activities()->where('type','message')->count() }}
                                                    </span>
                                                </p>
                                                <p class="pull-right m-b-0" style="margin:0px 25px;">
                                                    <i class="fa fa-paperclip"></i>
                                                    <span id="attachment{{ $task1->id }}">
                                                   {{ $task1->task_attachments()->count() }}
                                                </span>
                                                </p>
                                                <p class="pull-right m-b-0" style="margin:0px 25px;">
                                                    <?php
                                                    $result = 0;
                                                    if($task1->task_subtasks()->count() != 0){
                                                        $result =  ($task1->task_subtasks()->where('isComplete',1)->count() /
                                                                $task1->task_subtasks()->count()) * 100;
                                                    }
                                                    ?>
                                                    <span id="percent{{ $task1->id }}">{{ round($result) }}</span>
                                                    <i class="fa fa-percent"></i>

                                                </p>
                                                <p class="m-b-0 text-muted mt{{ $task1->id }}">
                                                    @if(count($task1->users()->get()))
                                                        @foreach($task1->users()->get() as $user)
                                                            <img id="memberTV{{ $user->id }}{{ $task1->id }}" data-task-id="{{ $task1->id }}" data-id="{{ $user->id }}" src="{{ $user->photo }}" alt="{{ $user->last_name }}"
                                                                 class="thumb-sm rounded-circle img-task task-user">
                                                        @endforeach
                                                    @endif
                                                </p>
                                            </div>
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

                            <ul class="sortable-list taskList list-unstyled main-container" id="completed">
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
                                            @if(count($task->task_labels()->get()))
                                                <div class="card-tags ct{{ $task->id }}" >
                                                    @foreach($task->task_labels()->get() as $label)
                                                        <span class="card-label" style="background-color: {{ $label->color }}"
                                                              title="{{ $label->name }}">{{ $label->name }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <a class="task-title btn-task-detail" id="task{{ $task->id }}"
                                               data-toggle="modal" data-target="#modalDetail"
                                               data-url="{{ route('app.details.task', $task->id ) }}">
                                                {{ $task->name }}
                                            </a>
                                            <div class="m-t-20" style="margin-top: 7px !important;">
                                                <p class="pull-right m-b-0">
                                                    <i class="fa fa-comment-o"></i>
                                                    <span id="comment{{ $task->id }}">
                                                        {{ $task->task_activities()->where('type','message')->count() }}
                                                    </span>
                                                </p>
                                                <p class="pull-right m-b-0" style="margin:0px 25px;">
                                                    <i class="fa fa-paperclip"></i>
                                                    <span id="attachment{{ $task->id }}">
                                                   {{ $task->task_attachments()->count() }}
                                                </span>
                                                </p>
                                                <p class="pull-right m-b-0" style="margin:0px 25px;">
                                                    <?php
                                                    $result = 0;
                                                    if($task->task_subtasks()->count() != 0){
                                                        $result =  ($task->task_subtasks()->where('isComplete',1)->count() /
                                                                $task->task_subtasks()->count()) * 100;
                                                    }
                                                    ?>
                                                    <span id="percent{{ $task->id }}">
                                                   {{ round($result) }}
                                                </span>
                                                    <i class="fa fa-percent"></i>

                                                </p>
                                                <p class="m-b-0 text-muted mt{{ $task->id }}">
                                                    @if(count($task->users()->get()))
                                                        @foreach($task->users()->get() as $user)
                                                            <img id="memberTV{{ $user->id }}{{ $task->id }}" data-task-id="{{ $task->id }}" data-id="{{ $user->id }}" src="{{ $user->photo }}" alt="{{ $user->last_name }}"
                                                                 class="thumb-sm rounded-circle img-task task-user">
                                                        @endforeach
                                                    @endif
                                                </p>
                                            </div>
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
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/assets/subtask.js') }}"></script>
    <script src="{{ asset('js/checklist.js') }}"></script>
    <script src="{{ asset('js/assets/attachment.js') }}"></script>
    <script src="{{ asset('js/assets/activity.js') }}"></script>
    <script src="{{ asset('js/assets/label.js') }}"></script>
    <script src="{{ asset('js/assets/member.js') }}"></script>
     <!--FooTable
     <script src="../plugins/footable/js/footable.all.min.js"></script>

     <script src="../plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>-->

     <!--FooTable Example
     <script src="assets/pages/jquery.footable.js"></script>-->

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
            url: "/attachment/upload",
            addRemoveLinks : true,
            //acceptedFiles: 'image/*',
            maxFilesize: 5.5,
            maxFiles:1,
            dictResponseError: 'Error al subir foto!',
            success:function(file,data){
                if(data.status == "Uploaded")
                {
                    notification('Attachment','File Uploaded Successfully', 'success',3000);
                    getAll();
                    concatActivity(data.activity.date_time, data.photo, data.username,data.user,
                        data.activity.message);
                    $("#attachment"+data.taskid).text(data.count);
                }
              else notification('Error','An error occurred, try again','error',3000);

              Dropzone.forElement("#mydropzone").removeAllFiles(true);
            }
        });
        
        //editable
        $('#titleTask').editable({
            validate: function(value) {
                if($.trim(value) == '') return 'This field is required';
            },
            mode: 'inline',
            inputclass: 'input-sm-overwrite',
            url:'/task/update',
            success:function(response, newValue){
                if(response.status == "Updated"){
                    concatActivity(response.activity.date_time, response.photo, response.username,
                        response.user, response.activity.message);
                    $("#task"+response.taskid).text(response.taskname);
                }

            }
        });

        $('#descriptionTask').editable({
            showbuttons: 'bottom',
            mode: 'inline',
            inputclass: 'input-large-overwrite',
            url:'/task/update',
            success:function(response, newValue){
                if(response.status == "Updated"){
                    concatActivity(response.activity.date_time, response.photo, response.username,
                        response.user, response.activity.message);
                }
            }
        });

        $('.form_datetime').datetimepicker({
            format: "dd-M - hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: moment().format('YYYY-MM-D'),
            pickerPosition: "bottom-left"

        }).on('changeDate',function(ev){
            var dateParse = moment(ev.date).format('YYYY-MM-DD HH:mm:ss'); 
            updateDate(dateParse);
        });

        showInformation();
        removeAll();
        saveComment();

        $('.close-popup').on('click', function() {
            $(".messagepop").hide();
        });

        $("#myPopup").click(function(){
            $(".labels-popup").show();
        });

        $("#myPopupMembers").click(function(){
            $(".members-popup").show();
        });

        /*Labels*/
        saveLabel();
        addMemberToTask();
        removeMember();
	</script>
@stop


