<!DOCTYPE html>
<html>
@include('inc.header')
<body>
{!! csrf_field() !!}
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100  p-b-20">
			@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
					<div class="alert alert-danger" role="alert">
						<h5><i class="icon fa fa-ban"></i> Alert!</h5>
						{!! $error !!}
					</div>
				@endforeach
			@endif
				<form  class="form-horizontal" method="POST" action="{{ route('verify') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<span class="login100-form-avatar">
						<img src="{{asset('images/logo_sign.png')}}" alt="AVATAR">
					</span>
				<span class="login100-form-title p-b-20">
						Verify your number
					</span>
				<div class="row">
					<div class="col col-sm-12">
                        <label for="code">Code:</label>
                        <input id="code" type="text" class="input100 form-control" name="code" required >
                    </div>
				</div>
                <br> <br>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn"  type="submit"  style="font-family: Poppins-SemiBold, sans-serif; width: 100%;">
						Verify
					</button>

				</div>
				<br>
				<ul class="login-more">
					<li class="m-b-8">
							<span class="txt1">

							</span>
                        <a href="./{{request()->phone}}/resendcode/" class="txt2 text-center" >Request new Code</a>
                        <input type="hidden" name='phone' value="{{request()->phone}}">

					</li>
				</ul>
			</form>
		</div>
	</div>
</div>
<div id="dropDownSelect1"></div>
</body>
</html>