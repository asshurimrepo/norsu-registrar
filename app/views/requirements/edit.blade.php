@extends('admin')

@section('ht') 
	Update Requirement
@stop

@section('cnt')

{{ Form::model($req, ['route'=>['requirements.update', $req->id], 'method'=>'put']) }}
  <div class="form-group">
  	{{ Form::label('name', 'Requirement Name') }}
  	{{ Form::text('name', Input::old('name'), ['class'=>'form-control']) }}
  </div>




  <button type="submit" class="btn btn-default">Submit</button>
{{ Form::close() }}
@stop