@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <style>
		.my-project{
			border-color: #4c5667 !important;
			border-radius: .25rem;
			border: 1px solid;
			cursor:pointer;
			margin: 6px 10px 7px 30px;
			/*padding-right: 15px !important;*/
		}
		.grow{
			transition: 1s ease;
		}
		.grow:hover{
			-webkit-transform: scale(0.9);
			-ms-transform: scale(0.9);
			transform: scale(0.9);
			transition: 1s ease;
		}
        .list-projects{
            margin-left:55px !important;
        }
        .bootstrap-tagsinput{
            width:720px !important;
        }
	</style>
@stop

@section('container')
	<div class="col-md-12">
        <div class="portlet" id="layoutProjects">
            <div class="portlet-heading bg-inverse">
                <h3 class="portlet-title">My Projects</h3>
                    <div class="portlet-widgets">
                       <a href="javascript:void(0)" data-toggle="reload" class="btn-refresh"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a href="#" class="btn-new" data-toggle="modal" 
                        data-target="#modalAdd"><i class="ion-plus-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
            </div>
            <div id="bg-inverse" class="panel-collapse collapse show">
                <div class="portlet-body">
                    <div class="row list-projects">
                    	@if(count($myprojects))
                    		@foreach($myprojects as $project)
                    			<div class="col-md-3 my-project grow">
			                        <div class="card-box widget-box-1" style="border: none;margin-bottom: 0px !important;">

			                            <a onclick="remove({{ $project->id }});">
                                            <i class="fa fa-trash pull-right inform" 
                                            style="color: red;"></i>         
                                        </a>
                                        <a href="#" data-toggle="modal" data-idproject="{{ $project->id }}"
                                           class="btn-send-invitation" data-target="#modalInvitation">
                                            <i class="fa fa-user-plus pull-right inform"></i>
                                        </a>
                                        <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $project->description }}"></i>
			                            <a class="text-dark" 
                                        href="{{ route('app.project.detail',$project->id) }}" style="font-size: 15px;">
			                            	{{ $project->name }}
			                            </a>
			                        </div>
                    			</div>
                    		@endforeach
                    	@else
                    		<div class="alert alert-danger col-md-12">

                                	<strong style="text-align: center;">You don't have any projects.</strong>

                            </div>
                    	@endif
                    	
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            @include('partials.new-project')
	        </div>
	    </div>
	</div>
    <div id="modalInvitation" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @include('partials.send-invitation')
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/assets/project.js') }}"></script>
    <script src="{{ asset('js/assets/sinvitation.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script>
        save();
        list();
        send();
        addUser();
    </script>

@stop
