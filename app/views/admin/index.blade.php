@extends('admin')

@section('ht') Requested Documents @stop

@section('cnt')
	

	<table class="table table-striped table-condensed  datatable">
			
			<thead>
					
					<tr>
							<th><a class="tip" title="Request Reference #" >R#</a></th>
							<th>Stud ID</th>
							<th>Student Name</th>
							<th><a class="tip" title="No. of Document Requested" >NDR</a></th>
							<th>Status</th>
							<th>Date of Request</th>
							<th>Action</th>

					</tr>	

			</thead>

			<tbody>
			@foreach($reqs as $r)
				<tr class="{{ $r->stclass() }}">
					
					<td>{{ $r->id }}</td>
					<td>{{ $r->student->studentID }}</td>
					<td>{{ $r->student->fullName() }}</td>
					<td>{{ $r->documents->count() }}</td>
					<td>{{ $r->status() }}</td>
					<td>{{ date('d M Y h:i a', strtotime($r->created_at)) }}</td>
					<td>
						<center>
						<a  data-toggle="tooltip" href="{{ url('request/'.$r->id) }}" title="Open" class="tip"> <i class="glyphicon glyphicon-log-in"></i> </a>
						</center>

					</td>

				</tr>
			@endforeach
			</tbody>

	</table>
		
	
@stop