@extends('admin')

@section('ht') 
	List of Requirements <span class="badge">{{ $reqs->count() }}</span> 
@stop

@section('cnt')
	
	<table class="table table-striped table-condensed  datatable">
			
			<thead>
					
					<tr>
							
							<th>Requirement Name</th>
							<th>Date Added</th>
							<th>Action</th>

					</tr>	

			</thead>

			<tbody>
			@foreach($reqs as $req)
				<tr>
					
					<td>{{ $req->name }}</td>
					<td>{{ date('d M Y h:i a', strtotime($req->created_at)) }}</td>
					<td>
						<center>
						{{ Form::open(['route'=>['requirements.destroy', $req->id], 'method'=>'delete', 'class'=>'delete']) }}
						<a  data-toggle="tooltip" href="{{ route('requirements.edit', $req->id) }}" title="Edit" class="tip"> <i class="glyphicon glyphicon-edit"></i> </a>
						<button title="Delete" class="tip btn-link"> <i class="glyphicon glyphicon-remove"></i> </button>
						{{ Form::close() }}
						</center>

					</td>

				</tr>
			@endforeach
			</tbody>

	</table>

@stop