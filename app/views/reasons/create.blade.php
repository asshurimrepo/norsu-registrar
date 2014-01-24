@extends('admin')

@section('ht') 
	Add New Reason
@stop

@section('cnt')

{{ Form::open(['route'=>'reasons.store']) }}
  <div class="form-group">
  	{{ Form::label('name', 'Reason') }}
  	{{ Form::text('name', Input::old('name'), ['class'=>'form-control']) }}
  </div>


  <button type="submit" class="btn btn-default">Submit</button>
{{ Form::close() }}
@stop