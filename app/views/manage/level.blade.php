@extends('neon')

@section('c')
	
	<h2> <i class="{{ $l->icon }}"></i> {{ $l->name }}</h2>

	<div class="row">
		

		<div class="col-sm-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Latest Updated Documents</div>
				
			</div>
				
			<table class="table table-bordered table-responsive  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Request ID</th>
						<th>Type of Document</th>
						<th>Requested By</th>
						<th>Status</th>
						<th>Updated At</th>
						<th>Otions</th>
					</tr>
				</thead>
				
				<tbody>


				@foreach($r as $i=>$d)
					<tr>
						

						<td>{{ $i+1 }}</td>
						<td>{{ $d->id }}</td>
						<td>{{ $d->document->name }}</td>
						<td>{{ $d->request->student->fullName() }}</td>
						<td>{{ $d->level->name }}</td>
						<td>{{ $d->date('updated_at') }}</td>
						<td class="col-sm-1s">

							<a href="{{ url('manage/proceed/'.$d->id) }}" class="btn btn-success btn-xs btn-icon icon-left">
								<i class="entypo-right-open"></i>
								Proceed
	 						</a>

						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
		
	</div>
	

	</div>

@stop