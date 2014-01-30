@extends('neon')


@section('js')
	
	<script type="text/javascript">
	// Code used to add Todo Tasks
	var number_of_requirements = {{ count($r->document->requirements) }};

	jQuery(document).ready(function($)
	{
		var $todo_tasks = $("#todo_tasks");

		replaceCheckboxes();

		checkIfReady();

		$('.todo_list').click(function(){
			var ref_id = $(this).data('id');
			var status = this.checked;
			var type = 'r';
			var document_request_id = {{ $r->id }};

			checkIfReady();

			$.post('{{ url('task/done') }}', {ref_id:ref_id, status:status, type:type, document_request_id: document_request_id});
		});

	
	});


	function checkIfReady () {
		var checked = $(".todo_list:checked").length;
		$(".task-done").html(checked);
		if(checked == number_of_requirements)
			$(".btn-proceed").removeClass('disabled');
		else
			$(".btn-proceed").addClass('disabled');

	}
</script>

@stop

@section('c')
	<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<h1> <i class="{{ $r->level->icon }}"></i> {{ $r->document->name }}</h1>
			<h3><strong>Requested By:</strong> {{ $r->request->student->fullName(); }}</h3>
		</div>
	</div>
</div>	


<div class="row">
	
	<div class="col-sm-9">
		<div class="tile-block" id="todo_tasks">
			
			<div class="tile-header">
				<i class="entypo-list"></i>
				
				<a href="#">
					Requirements
					<span>check list, tick one.</span>
				</a>
			</div>
			
			<div class="tile-content">
				
				<!-- <input type="text" class="form-control" placeholder="Add Task"> -->
				
				
				<ul class="todo-list">
					
					@foreach($r->document->requirements as $req)
					<li> <div class="checkbox checkbox-replace color-white"><input type="checkbox" class="todo_list" data-id="{{ $req->id }}" {{ $r->isTaskDone($req->id) ? 'checked' : '' }} /><label>{{ $req->name }}</label></div></li>
					@endforeach

				</ul>
				
			</div>
			
			<div class="tile-footer" style="text-align:right;">
				<a href="{{ url('manage/proceed/'.$r->id) }}" class="btn btn-success btn-proceed disabled ">Proceed To Next 
								<i class="entypo-right-open"></i>
				</a>
			</div>
			
		</div>
	</div>

	<div class="col-sm-3">
			
		<div class="row">
			
			<div class="col-sm-12">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-check"></i></div>
			<div class="num task-done" data-start="0" data-end="{{ count($r->taskDone) }}" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Task Done</h3>
			<p>out of {{ count($r->document->requirements) }}</p>
		</div>
		
	</div>

		</div>


	</div>
		
	</div>

</div>

@stop