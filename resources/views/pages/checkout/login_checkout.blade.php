<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<base href="{{asset('')}}">
    <link rel="stylesheet" href="public/fontend/css/login.css" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="{{URL::to('/add-customer')}}" method="post">
            {{ csrf_field() }}
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="customer_name" data-validation="length" data-validation-length="min6" data-validation-error-msg="Vui long nhập lại tên"/>
			<input type="email" placeholder="Email" name="customer_email" />
			<input type="password" placeholder="Password" name="customer_password" />
			<input type="numer" placeholder="phone" name="customer_phone" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="{{URL::to('/login-customer')}}" method="post">
			{{ csrf_field() }}
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="email" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập lại gmail"/>
			<input type="password" placeholder="Password" name="password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Chào Mừng Bạn!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
<!--  note-->
<script type="text/javascript">
	$.validate({
		
	});
</script>
<script src="public/fontend/js/login.js"></script>
</body>
</html>