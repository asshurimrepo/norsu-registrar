@extends('admin')

@section('ht') New User @stop

@section('cnt')
	
{{ Form::open(['route'=>'users.store']) }}
  
  <div class="col-md-6">

  <div class="form-group">
  	{{ Form::label('username', 'Username') }}
  	{{ Form::text('username', Input::old('username'), ['class'=>'form-control']) }}
  </div>

  <div class="form-group">
  	{{ Form::label('password', 'Password') }}
  	{{ Form::password('password',  ['class'=>'form-control']) }}
  </div>

  <div class="form-group">
  	{{ Form::label('fname', 'First Name') }}
  	{{ Form::text('fname', Input::old('fname'), ['class'=>'form-control']) }}
  </div>

  <div class="form-group">
  	{{ Form::label('lname', 'Last Name') }}
  	{{ Form::text('lname', Input::old('lname'), ['class'=>'form-control']) }}
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="is_admin" value="1"> Set Account as Adminstrator
    </label>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="suspended" value="1"> Suspended
    </label>
  </div>

  </div>

  <div class="col-md-6">
  <div class="form-group">
	<table class="table table-striped table-condensed  datatable">
			
			<thead>
					
					<tr>
							<th></th>
							<th>Access Level/Permissions</th>

					</tr>	

			</thead>

			<tbody>
				
				@foreach(Level::all() as $l)
				<tr>
					
					<td>{{ Form::checkbox('level_id[]', $l->id) }}</td>
					<td>{{ $l->name }}</td>
					

				</tr>
				@endforeach

			</tbody>

	</table>
</div>
</div>

  <button type="submit" class="btn btn-default">Submit</button>
{{ Form::close() }}
	
@stop