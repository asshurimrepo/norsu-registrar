@extends('master')


@section('c')
	
<div class="jumbotron">
 	<h1>Your Request has been successfully Submitted!</h1>
 	<p> Please follow up your request at the registrar! </p>
 	<a class="btn btn-lg btn-block btn-info" href="{{ url('app') }}" >FINISH!</a>
</div>

@stop