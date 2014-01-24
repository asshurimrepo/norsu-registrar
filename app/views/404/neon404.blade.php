@extends('neon')

@section('title')
	404 ERROR PAGE NOT FOUND | @parent
@stop

@section('body')
	
	
<div class="page-error-404">
	
	
	<div class="error-symbol">
		<i class="entypo-attention"></i>
	</div>
	
	<div class="error-text">
		<h2>404</h2>
		<p>Page not found!</p>
	</div>
	
	<a class="btn btn-gold btn-lg" href="{{ URL::previous() }}" >Return</a>

</div>	

@stop