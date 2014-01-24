<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="NORSU Registrar Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>
		@section('title')
			@if(isset($title))
				{{ $title }} |
			@endif
			{{ Setting::first()->site_name }}
		@show
	</title>

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

<body class="page-body page-fade">

{{-- if you dont want to Overide Body Tag --}}
@section('body')
	
	<div class="page-container">
		

		@include('themes.neon.sidebar-menu')
	

		<div class="main-content">
			 
			 @include('themes.neon.profile-info')
			 @yield('c')

		</div>
	
	
	</div>

@show

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