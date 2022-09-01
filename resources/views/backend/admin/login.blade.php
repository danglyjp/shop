<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('login-form')}}/images/icons/favicon.ico"/>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!--==============================	=================================================================-->
  {{-- <link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap/dist/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="{{asset('backend')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!--===============================================================================================-->
	{{-- <link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css"> --}}
	<link rel="stylesheet" href="{{asset('backend')}}/bower_components/font-awesome/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
{{-- <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================--> --}}
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('login-form')}}/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Đăng Nhập
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('admin.postLogin') }}" method="post">
					@csrf

					<div class="show-error">
						<br/>
						@if ($errors->any())
							@foreach ($errors->all() as $error)
								<li style="color: red;text-align: center;">{{ $error }}</li>
							@endforeach
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 btn-show-pass" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<style>
					label.checkbox,.for-pass {
						text-indent: 55px;
						margin-top: 20px;
						}
					</style>
					<label class='checkbox'>
						<input type='checkbox' value='TRUE' title='Keep me Signed in' name="remember_token" /> Ghi nhớ đăng nhập
					</label>

				</form>
				<div class="for-pass"><a href="/"><b>Quên Mật Khẩu?</b></a></div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	{{-- <script src="{{asset('login-form')}}/vendor/jquery/jquery-3.2.1.min.js"></script> --}}
	<!-- jQuery 3 -->
	<script src="{{url('backend')}}/bower_components/jquery/dist/jquery.min.js"></script>
	{{-- <script src="{{asset('login-form')}}/vendor/animsition/js/animsition.min.js"></script> --}}
	{{-- <script src="{{asset('login-form')}}/vendor/bootstrap/js/popper.js"></script> --}}
	{{-- <script src="{{asset('login-form')}}/vendor/bootstrap/js/bootstrap.min.js"></script> --}}
<!-- Bootstrap 3.3.7 -->
<script src="{{url('backend')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
{{-- <!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('login-form')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================--> --}}
	<script src="{{asset('login-form')}}/js/main.js"></script>

</body>
</html>