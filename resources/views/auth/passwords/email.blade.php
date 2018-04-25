<!DOCTYPE html>
<html>
	
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		

		<link rel="shortcut icon" href="">

		<title>Taskux</title>

		<!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('js/modernizr.min.js') }}"></script>

	</head>
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h4 class="text-center"> Reset Password </h4>
                </div>
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

				<div class="p-20">
					<form method="post" action="{{ route('password.email') }}" role="form" class="text-center">
						{{ csrf_field() }}
					
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<div class="col-12">
								<input class="form-control" type="email" required 
								autofocus placeholder="Email" name="email" 
								value="{{ $email or old('email') }}">
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
                                    @endif
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default w-sm waves-effect waves-light btn-block">
                                        Send Password Reset Link
                                    </button> 
                                </span>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>

		<!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

		<!-- App js -->
        <script src="{{ asset('js/jquery.core.js') }}"></script>
        <script src="{{ asset('js/jquery.app.js') }}"></script>

	</body>
</html>
