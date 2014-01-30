@extends('neon')

@section('alert') @stop	


@section('c')
	
	<div class="row">
		
	<div class="col-sm-12">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-docs"></i></div>
			<div class="num" data-start="0" data-end="{{ $totalCount }}" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Documents</h3>
			<p>so far in my account.</p>
		</div>
		
	</div>
	
	</div>	

	 
	 @include('alert')

	 @include('manage.requesttable')	


@stop