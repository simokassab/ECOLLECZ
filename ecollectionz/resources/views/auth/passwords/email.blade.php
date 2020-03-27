<!DOCTYPE html>
<html>
@include('inc.header')
<body>
{!! csrf_field() !!}

<div class="container-fluid">
    @include('inc.nav')
	<div class="HomeSection">
		<div>
			<div class="row" style="margin:0;">
				<div class="col-md-6 as " id="tofix">
					<div class="wrap-select-arrow">

					</div>
				</div>

				<div class="col-md-6 to" id="SignIn">
					<div class="contact text-left">
						<div class="mySlides1">
							<p style="margin-bottom: 10% !important;"> Reset Password</p>
							@if (count($errors) > 0)
								@foreach ($errors->all() as $error)
									<div class="alert alert-danger" role="alert">
										<h5><i class="icon fa fa-ban"></i> Alert!</h5>
										{!! $error !!}
									</div>
								@endforeach
							@endif
							<form  class="form-horizontal form_re" method="POST" action="{{ route('password.email') }}" >
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group" style="margin-bottom: 10%;">
									<label for="email">Email: </label>
									<input id="email" type="email" class="input100 form-control inputai" name="email" value="{{ old('email') }}" required>
									@if ($errors->has('email'))
										<span class="help-block">
								    <strong>{{ $errors->first('email') }}</strong>

									@endif
								</div>
								<div class="form-group">
									<button type="submit" class="btn" style="margin-top: 0% !important; width: 100%!important;">Send Password Reset Link</button>
									<br/>
									@if (session('status'))
										<div class="alert alert-success" style='z-index:10;' >
											{{ session('status') }}
										</div>
									@endif
								</div>
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