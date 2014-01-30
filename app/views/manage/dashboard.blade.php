@extends('neon')

@section('alert') @stop	

@section('js')
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("tr").mouseenter(function(){
				$(this).find("td button").removeClass('hide');
			}).mouseleave(function(){
				$(this).find("td button").addClass('hide');
			});
		});
	</script>

@stop

@section('c')
	
	<div class="row">
		
	<div class="col-sm-12">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-docs"></i></div>
			<div class="num" data-start="0" data-end="{{ $totalCount }}" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Documents</h3>
			<p>so far in my account.</p>
		</div>
		
	</div>
	
	</div>	

	 
	 @include('alert')

	<div class="row">
		<div class="col-sm-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Latest Updated Documents</div>
				
			</div>
				
			<table class="table table-bordered table-responsive  table-hover">
				<thead>
					<tr>
						<th></th>
						<th>#</th>
						<th>Request ID</th>
						<th>Type of Document</th>
						<th>Requested By</th>
						<th>Status</th>
						<th>Updated At</th>
						<th>Otions</th>
					</tr>
				</thead>
				
				<tbody>


				@foreach($updatedDocs as $i=>$d)
					<tr>
						<td style="text-align:center; width:133px;"> 

						@if(isset($d->label->name))
							<span class="badge" style="background:{{ $d->label->color }}; color:#FFF">{{ $d->label->name }}</span> 
						@endif 

							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-red dropdown-toggle hide" data-toggle="dropdown"><span class="caret"></span></button>

								<ul class="dropdown-menu dropdown-default" role="menu">
									@foreach($labels as $l)
									<li><a href="#"><?=$l->name?></a></li>
									@endforeach
								</ul>

							</div> 
						</td>

						<td>{{ $i+1 }}</td>
						<td>{{ $d->id }}</td>
						<td>{{ $d->document->name }}</td>
						<td>{{ $d->request->student->fullName() }}</td>
						<td>{{ $d->level->name }}</td>
						<td>{{ $d->date('updated_at') }}</td>
						<td class="col-sm-1s">

							<a href="{{ url('manage/request/'.$d->id) }}" class="btn btn-success btn-xs btn-icon icon-left">
								<i class="entypo-right-open"></i>
								Proceed
	 						</a>

						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
		
	</div>
	</div>
	


@stop