<!DOCTYPE html>
<html>
	
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="">

		<title>Register</title>

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
			<div class="card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Sign Up </h3>
				</div>

				<div class="p-20">
					<form class="form-horizontal m-t-20"  method="POST" 
					action="{{ route('app.register.submit') }}">
					
					 {{  csrf_field() }}

						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<div class="col-12">
								<input class="form-control" type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>
								@if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							<div class="col-12">
								<input class="form-control" type="text" required="" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
								@if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<div class="col-12">
								<input class="form-control" type="email" required="" placeholder="Email" name="email" value="{{ old('email') }}">
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<div class="col-12">
								<input class="form-control" type="text" required="" placeholder="Username" name="username" value="{{ old('username') }}">
								@if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="col-12">
								<input class="form-control" type="password" required="" placeholder="Password" name="password">
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-12">
								<button class="btn btn-default btn-block text-uppercase waves-effect waves-light" type="submit">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="col-12 text-center">
					<p>
						Already have account?<a href="{{ route('app.login.form') }}" class="text-primary m-l-5"><b>Sign In</b></a>
					</p>
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
