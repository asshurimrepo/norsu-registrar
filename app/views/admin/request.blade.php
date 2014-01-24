@extends('admin')

@section('ht') 
	
	R# {{ $r->id }} - {{ $r->student->fullName() }} ({{ $r->student->studentID }})

@stop

@section('cnt')
<div class="row">

	<div class="col-md-6">
		<div class="panel panel-primary">
		  <div class="panel-heading"><b> Documents Requested </b></div>
		

		  <!-- Table -->
		  <table class="table table-striped table-condensed table-bordered">

		  		<thead>
		  			
		  			<tr>
		  				<th>Document Type</th>
		  				<th>Status</th>
		  				<th>Action</th>
		  			</tr>

		  		</thead>

		  		<tbody>
		  			
		  			@foreach($r->documents as $d)

		  				<tr class="{{ $d->rstatus(true) }}">
		  						
		  					<td>{{ $d->name }}</td>
		  					<td>{{ $d->rstatus() }}</td>
		  					<td>
		  					<center>

		  					@if($d->pivot->status)

		  						<a href="{{ url('mark-undone/'.$r->id.'/'.$d->id	) }}" class="tip" title="Mark as Pending"><i class="glyphicon glyphicon-remove"></i></a>
		  					@else
		  						 <a href="{{ url('mark-done/'.$r->id.'/'.$d->id) }}" class="tip" title="Mark as Done"><i class="glyphicon glyphicon-check"></i></a>

		  					@endif

		  					</center>
		  					</td>

		  				</tr>

		  			@endforeach

		  		</tbody>

		  </table>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-warning">
		  <div class="panel-heading"><b> Purpose of Request </b></div>
		

		  <!-- Table -->
		  <table class="table table-striped table-condensed table-bordered">

		  		

		  		<tbody>
		  			
		  			@foreach($r->reasons as $p)

		  				<tr>
		  						
		  					<td>{{ $p->name }}</td>

		  				</tr>

		  			@endforeach

		  		</tbody>

		  </table>
		</div>
	</div>

	

</div>


<div class="row">
	
	<div class="col-md-3 col-md-offset-9">
		
		<a href="{{ url('mark-cleared/'.$r->id) }}" class="btn btn-primary btn-block">Mark as Cleared</a>

	</div>

</div>

@stop