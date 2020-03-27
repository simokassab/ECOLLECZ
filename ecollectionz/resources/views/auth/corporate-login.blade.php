<!DOCTYPE html>
<html>
@include('inc.header')
<body class="body">
{!! csrf_field() !!}

<div class="container-fluid">

	@include('inc.nav')

	<style>
		@media (max-width: 991px) {

			.mySlides1 p {
				margin-top: 12%;
				margin-left: 15% !important;
			}
			.form_re {
				width: 100%!important;
			}

			.contact span {
				margin-bottom: 3px!important;
				margin-left: 0% !important;
			}

		}
		.contact span {
			margin-bottom: 3px!important;
			margin-left: 0% !important;
		}
	</style>
	<!-- end Header -->

	<!--start HomeSection-->
	<div class="HomeSection">
		<div>
			<div class="row" style="margin:0;">
				<div class="col-md-6 as" style="margin-top: 5%;" id="tofix">

					<h6 id="form1">SIGN IN AS:</h6>
					<div class="wrap-select-arrow">
						<select class="active SignAs sel"  id="signin_c">
							<option value="0" class="SignAsOption" >Client </option>
							<option value="1" class="SignAsOption"  selected="selected">Corporate </option>
							<option value="2" class="SignAsOption" >Agent </option>
							<option value="3" class="SignAsOption" >Broker </option>
						</select>
						<div class="select-arrow">
							<div class="arrow-up"></div>
							<div class="arrow-down"></div>
						</div>
					</div>

				</div>

				<div class="col-md-6 to to1" id="SignIn" >
					<div class="contact text-left">
						<div class="mySlides1">
							<p class="signintitle" style="margin-bottom: 30px">Corporate Sign IN</p>
							@if (count($errors) > 0)
								@foreach ($errors->all() as $error)
									<div class="alert alert-danger" role="alert">
										<h5><i class="icon fa fa-ban"></i> Alert!</h5>
										{!! $error !!}
									</div>
								@endforeach
							@endif
							<form  class="form-horizontal form_re" method="POST" action="{{ route('corporate.login.submit') }}" 	>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<label>USER NAME</label>
								<input class="form-control input-lg inputai"   name="email" type="text" placeholder="USER NAME" required>
								<label>PASSWORD</label>
								<input class="form-control input-lg inputai"  type="password"  name="password" placeholder="*******" required>

								<button type="submit" id="submit" name="submit"  class="btn inputai">SIGN IN</button>
							</form>
							<a   style="color: #A9A9A9; text-decoration: none; margin-left: 25%;" href="{{ route('corporate.password.request') }}" >
								Forgot Password?
							</a>

						</div>

					</div>
				</div>
				<!-- The dots/circles -->
			</div>
		</div>
	</div>
	<!--end HomeSection-->
</div>
</body>
</html>