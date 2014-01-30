@extends('neon')


@section('js')
	
	<script type="text/javascript">
	// Code used to add Todo Tasks
	$(document).ready(function($)
	{	
		var $todo_tasks = $("#todo_tasks");
		
		$todo_tasks.find('input[type="text"]').on('keydown', function(ev)
		{
			if(ev.keyCode == 13)
			{
				ev.preventDefault();
				
				if($.trim($(this).val()).length)
				{
					var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
					$(this).val('');
					
					$todo_entry.appendTo($todo_tasks.find('.todo-list'));
					$todo_entry.hide().slideDown('fast');
					replaceCheckboxes();
				}
			}
		});
	});
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
					Tasks
					<span>To do list, tick one.</span>
				</a>
			</div>
			
			<div class="tile-content">
				
				<input type="text" class="form-control" placeholder="Add Task">
				
				
				<ul class="todo-list">
					<li>
						<div class="checkbox checkbox-replace color-white neon-cb-replacement">
							<label class="cb-wrapper"><input type="checkbox"><div class="checked"></div></label>
							<label>Website Design</label>
						</div>
					</li>
					
					<li>
						<div class="checkbox checkbox-replace color-white neon-cb-replacement checked">
							<label class="cb-wrapper"><input type="checkbox" id="task-2" checked=""><div class="checked"></div></label>
							<label>Slicing</label>
						</div>
					</li>
					
					<li>
						<div class="checkbox checkbox-replace color-white neon-cb-replacement">
							<label class="cb-wrapper"><input type="checkbox" id="task-3"><div class="checked"></div></label>
							<label>WordPress Integration</label>
						</div>
					</li>
					
					<li>
						<div class="checkbox checkbox-replace color-white neon-cb-replacement">
							<label class="cb-wrapper"><input type="checkbox" id="task-4"><div class="checked"></div></label>
							<label>SEO Optimize</label>
						</div>
					</li>
					
					<li>
						<div class="checkbox checkbox-replace color-white neon-cb-replacement checked">
							<label class="cb-wrapper"><input type="checkbox" id="task-5" checked=""><div class="checked"></div></label>
							<label>Minify &amp; Compress</label>
						</div>
					</li>
				</ul>
				
			</div>
			
			<div class="tile-footer">
				<a href="#">View all tasks</a>
			</div>
			
		</div>
	</div>

	<div class="col-sm-3">
			
		<div class="row">
			
			<div class="col-sm-12">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Registered users</h3>
			<p>so far in our blog, and our website.</p>
		</div>
		
	</div>

		</div>


	</div>
		
	</div>

</div>

@stop