@extends('master')

@section('c')
	
	<div class="well col-md-4 col-md-offset-4">
		
		<h2><i class="glyphicon glyphicon-lock"></i> Adminstrator Login</h2>


		{{ Form::open(['url'=>'auth/check']) }}

		<div class="form-group">
			{{ Form::text('username', Input::old('username'), ['class'=>'form-control', 'placeholder'=>'Username']) }}
		</div>

		<div class="form-group">
			{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
		</div>
		{{ Form::submit('Login', ['class'=>'btn btn-primary']) }}

		{{ Form::close() }}

	</div>

@stop