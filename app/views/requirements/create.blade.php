@extends('admin')

@section('ht') 
	Add New Requirement
@stop

@section('cnt')

{{ Form::open(['route'=>'requirements.store']) }}
  <div class="form-group">
  	{{ Form::label('name', 'Requirement Name') }}
  	{{ Form::text('name', Input::old('name'), ['class'=>'form-control']) }}
  </div>




  <button type="submit" class="btn btn-default">Submit</button>
{{ Form::close() }}
@stop