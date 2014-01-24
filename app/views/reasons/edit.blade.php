@extends('admin')

@section('ht') 
	Update Reason
@stop

@section('cnt')

{{ Form::model($r, ['route'=>['reasons.update', $r->id], 'method'=>'put']) }}
  <div class="form-group">
  	{{ Form::label('name', 'Reason') }}
  	{{ Form::text('name', Input::old('name'), ['class'=>'form-control']) }}
  </div>




  <button type="submit" class="btn btn-default">Submit</button>
{{ Form::close() }}
@stop