@extends('admin')

@section('ht') 
	List of Reasons <span class="badge">{{ $res->count() }}</span> 
@stop

@section('cnt')
	
	<table class="table table-striped table-condensed  datatable">
			
			<thead>
					
					<tr>
							
							<th>Reason</th>
							<th>Date Added</th>
							<th>Action</th>

					</tr>	

			</thead>

			<tbody>
			@foreach($res as $r)
				<tr>
					
					<td>{{ $r->name }}</td>
					<td>{{ date('d M Y h:i a', strtotime($r->created_at)) }}</td>
					<td>
						<center>
						{{ Form::open(['route'=>['reasons.destroy', $r->id], 'method'=>'delete', 'class'=>'delete']) }}
						<a  data-toggle="tooltip" href="{{ route('reasons.edit', $r->id) }}" title="Edit" class="tip"> <i class="glyphicon glyphicon-edit"></i> </a>
						<button title="Delete" class="tip btn-link"> <i class="glyphicon glyphicon-remove"></i> </button>
						{{ Form::close() }}
						</center>

					</td>

				</tr>
			@endforeach
			</tbody>

	</table>

@stop