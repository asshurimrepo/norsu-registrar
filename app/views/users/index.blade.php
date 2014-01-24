@extends('admin')

@section('ht')
	Users
@stop

@section('cnt')
	
	<table class="table table-striped table-condensed  datatable">
			
			<thead>
					
					<tr>
							
							<th>Username</th>
							<th>Access Levels</th>
							<th>Status</th>
							<th>Action</th>

					</tr>	

			</thead>

			<tbody>
			@foreach($users as $user)
				<tr>
					
					<td>{{ $user->username }}</td>
					<td>{{ $user->accessLevel->count() }}</td>
					<td>{{ !$user->suspended ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Suspended</span>' }}</td>
					<td>
						<center>
						{{ Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete', 'class'=>'delete']) }}
						<a  data-toggle="tooltip" href="{{ route('users.edit', $user->id) }}" title="Edit" class="tip"> <i class="glyphicon glyphicon-edit"></i> </a>
						<button title="Delete" class="tip btn-link"> <i class="glyphicon glyphicon-remove"></i> </button>
						{{ Form::close() }}
						</center>

					</td>

				</tr>
			@endforeach
			</tbody>

	</table>

@stop