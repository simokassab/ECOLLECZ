<!DOCTYPE html>
<html>
@include('inc.header')
<body>
{!! csrf_field() !!}

<div class="container-fluid">

	<!-- Start Header -->
	<!-- NAVBAR-->
	<nav class="navbar  navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
		<div class="container">
			<a href="#" class="navbar-brand">
				<!-- Logo Image -->
				<img src="{{asset('img/Logo.png')}}" alt="" class="d-inline-block align-middle mr-2">

			</a>

			<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

			<div id="navbarSupportedContent" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item "><a href="index.php" class="nav-link ">Home <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
					<li class="nav-item"><a href="contact.php"  class="nav-link">Contact</a></li>
					<li class="nav-item">
						<button class="btn btn-primary" style="width: 115px;"><a class="nav-link"   style="color: #1f325a;font-weight: bold;    padding: 3px;margin: 0"> SIGN IN </a></button>
					</li>
					<li class="nav-item">
						<img src="{{asset('img/Asset 17.png')}}" alt="" class="headIm">
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="HomeSection">
		<div>
			<div class="row" style="margin:0;">
				<div class="col-md-6 as " id="tofix">
					<div class="wrap-select-arrow">

					</div>
				</div>

				<div class="col-md-6 to" id="SignIn">
					<div class="contact text-left">
						<div class="mySlides1"><br/>
							<p style="margin-bottom: 30px"> Reset Password</p>
							@if (count($errors) > 0)
								@foreach ($errors->all() as $error)
									<div class="alert alert-danger" role="alert">
										<h5><i class="icon fa fa-ban"></i> Alert!</h5>
										{!! $error !!}
									</div>
								@endforeach
							@endif
							<form  class="form-horizontal" method="POST" action="{{ route('supervisor.password.request') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="token" value="{{$token}}">
								<div class="row">
									<div class="col col-sm-12">
										<div class="form-group">
											<label for="email">Email:</label>
											<input id="email" type="email" class="input100 form-control" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="Email">
											@if ($errors->has('email'))
												<span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12">
										<div class="form-group">
											<label for="password">New Password</label>
											<input id="password" type="password" class="input100 form-control" name="password" required  placeholder="Password">
											@if ($errors->has('password'))
												<span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12">
										<div class="form-group">
											<label for="password_confirmation">Confirm  Password</label>
											<input id="password-confirm" type="password" class=" input100 form-control" name="password_confirmation" required  placeholder="Confirm Password">
											@if ($errors->has('password_confirmation'))
												<span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12">
										<div class="container-login100-form-btn">
											<button class="btn"  style="margin-top: 0% !important;"  type="submit"  style="font-family: Poppins-SemiBold, sans-serif; width: 100%;">
												Change password
											</button>
										</div>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
				</div>
				<!-- The dots/circles -->
			</div>
		</div>
	</div></div>
<div id="dropDownSelect1"></div>
</body>
</html>