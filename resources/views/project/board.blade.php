@extends('layout')

@section('css')
	<style>
		.my-project{
			border-color: #4c5667 !important;
			border-radius: .25rem;
			border: 1px solid;
			cursor:pointer;
			margin: 6px 10px 7px 2px;
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
	</style>
@stop

@section('container')
	<div class="col-md-12">
        <div class="portlet">
            <div class="portlet-heading bg-inverse">
                <h3 class="portlet-title">My Projects</h3>
                    <div class="portlet-widgets">
                       <a href="javascript:;" data-toggle="reload" class="btn-refresh"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a href="#" class="btn-new" data-toggle="modal" 
                        data-target="#modalAdd"><i class="ion-plus-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
            </div>
            <div id="bg-inverse" class="panel-collapse collapse show">
                <div class="portlet-body">
                    <div class="row">
                    	@if(count($myprojects))
                    		@foreach($myprojects as $project)
                    			<div class="col-md-3 my-project grow">
			                        <div class="card-box widget-box-1" style="border: none;margin-bottom: 0px !important;">
			                            <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $project->description }}"></i>
			                            <span class="text-dark" style="font-size: 15px;">
			                            	{{ $project->name }}
			                            </span>
			                        </div>
                    			</div>
                    		@endforeach
                    	@else
                    		<div class="alert alert-danger col-md-12">
                                <center>
                                	<strong>You don't have any projects.</strong>
                                </center>	
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
@stop

@section('scripts')
    <script src="{{ asset('js/assets/project.js') }}"></script>
    <script>
        save();
        list();
    </script>  
@stop
