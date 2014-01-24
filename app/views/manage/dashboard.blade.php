@extends('neon')

@section('c')
	
	<div class="row">
		
	<div class="col-sm-12">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-docs"></i></div>
			<div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Documents</h3>
			<p>so far in my account.</p>
		</div>
		
	</div>
	
	</div>		

	<div class="row">
		<div class="col-sm-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Latest Updated Documents</div>
				
			</div>
				
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Type of Document</th>
						<th>Position</th>
						<th>Status</th>
						<th>Otions</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td>1</td>
						<td>Art Ramadani</td>
						<td>CEO</td>
						<td>CEO</td>
						<td class="col-sm-1s">

							<a href="#" class="btn btn-info btn-sm btn-icon icon-left">
								<i class="entypo-info"></i>
								Proceed
							</a>

						</td>
					</tr>
					

				</tbody>
			</table>
		</div>
		
	</div>
	</div>
	


@stop