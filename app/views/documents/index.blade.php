@extends('admin')

@section('ht') 
	Document Types <span class="badge">{{ $docs->count() }}</span> 
@stop

@section('cnt')
	
	<table class="table table-striped table-condensed  datatable">
			
			<thead>
					
					<tr>
							
							<th>Document Name</th>
							<th>Others</th>
							<th>Date Added</th>
							<th>Action</th>

					</tr>	

			</thead>

			<tbody>
			@foreach($docs as $doc)
				<tr>
					
					<td>{{ $doc->name }}</td>
					<td>{{ $doc->others ? '<span class="label label-danger">true</span>' : '<span class="label label-success">false</span>' }}</td>
					<td>{{ date('d M Y h:i a', strtotime($doc->created_at)) }}</td>
					<td>
						<center>
						{{ Form::open(['route'=>['documents.destroy', $doc->id], 'method'=>'delete', 'class'=>'delete']) }}
						<a  data-toggle="tooltip" href="{{ route('documents.edit', $doc->id) }}" title="Edit" class="tip"> <i class="glyphicon glyphicon-edit"></i> </a>
						<button title="Delete" class="tip btn-link"> <i class="glyphicon glyphicon-remove"></i> </button>
						{{ Form::close() }}
						</center>

					</td>

				</tr>
			@endforeach
			</tbody>

	</table>

@stop