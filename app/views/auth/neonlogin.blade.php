<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="NORSU Registrar Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>{{ Setting::first()->site_name }} | Login</title>

	{{ HTML::style('neon-x/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}
	{{ HTML::style('neon-x/assets/css/font-icons/entypo/css/entypo.css') }}
	{{ HTML::style('neon-x/assets/css/font-icons/entypo/css/animation.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic') }}
	{{ HTML::style('neon-x/assets/css/neon.css') }}
	{{ HTML::style('neon-x/assets/css/custom.css') }}

	{{ HTML::script('neon-x/assets/js/jquery-1.10.2.min.js') }}

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507135: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body login-page login-form-fall">

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="#" class="logo">
				{{ HTML::image('neon-x/assets/images/norsu-logo.png') }}
			</a>
			
			<p class="description">Dear user, log in to access the {{ Setting::first()->site_name }}  Area!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>{0%}</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		

		<div class="login-content">
			

			<!-- Real Login Form -->
			{{ Form::open(['url'=>'auth/check', 'id'=>'login_form']) }}
				{{ Form::hidden('username', null, ['id'=>'login_username']) }}
				{{ Form::hidden('password', null, ['id'=>'login_password']) }}
			{{ Form::close() }}

			<!-- Decoy -->
			<form method="post" role="form" id="form_login">
				
				@include('alert')

				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						Login In
						<i class="entypo-login"></i>
					</button>
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<!-- <a href="#" class="link">Forgot your password?</a> -->
				
				<br />
				
				<!-- <a href="#">ToS</a>  - <a href="#">Privacy Policy</a> -->
				
			</div>
			
		</div>
		
	</div>
	
</div>

	{{ HTML::script('neon-x/assets/js/gsap/main-gsap.js') }}
	{{ HTML::script('neon-x/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}
	{{ HTML::script('neon-x/assets/js/bootstrap.min.js') }}
	{{ HTML::script('neon-x/assets/js/joinable.js') }}
	{{ HTML::script('neon-x/assets/js/resizeable.js') }}
	{{ HTML::script('neon-x/assets/js/neon-api.js') }}
	{{ HTML::script('neon-x/assets/js/jquery.validate.min.js') }}
	{{ HTML::script('neon-x/assets/js/neon-login.js') }}
	{{ HTML::script('neon-x/assets/js/neon-custom.js') }}
	{{ HTML::script('neon-x/assets/js/neon-demo.js') }}

	
</body>
</html>