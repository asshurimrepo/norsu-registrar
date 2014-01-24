@extends('admin')

@section('ht') 
	Update Document Type
@stop

@section('cnt')

{{ Form::model($doc, ['route'=>['documents.update', $doc->id], 'method'=>'put']) }}
  <div class="form-group">
  	{{ Form::label('name', 'Document Type Name') }}
  	{{ Form::text('name', Input::old('name'), ['class'=>'form-control']) }}
  </div>

 <div class="checkbox">
    <label>
      {{ Form::hidden('others', 0) }}
      {{ Form::checkbox('others',1) }} Labeled as Others
      
    </label>
  </div>

<div class="form-group">
	<table class="table table-striped table-condensed  datatable">
			
			<thead>
					
					<tr>
							<th></th>
							<th>Requirement</th>

					</tr>	

			</thead>

			<tbody>
				
				@foreach(Requirement::all() as $r)
				<tr>
					
					<td>{{ Form::checkbox('requirement_id[]', $r->id, $doc->requirements->contains($r->id)) }}</td>
					<td>{{ $r->name }}</td>
					

				</tr>
				@endforeach

			</tbody>

	</table>
</div>


  <button type="submit" class="btn btn-default">Update</button>
{{ Form::close() }}
@stop