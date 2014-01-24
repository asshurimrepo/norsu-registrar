@extends('master')

@section('alert') @stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$(".jumbotron, .carousel").click(function(){
				$("#searchStudent").modal('show');
			});

			$(".carousel").carousel();
		});
	</script>
@stop


@section('c')
	
  <div class="carousel slide" data-ride="carousel">
  		
  		<!-- Indicators -->
  		<ol class="carousel-indicators">
  			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
  			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
  			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  		</ol>

  		<!-- Wrap for SLides -->
  		<div class="carousel-inner">
  			<div class="item active">
<div style="cursor:pointer;" class="jumbotron">
 		
  				 <h1 align="center"><span class="text-primary"> <span class="text-danger">N</span>egros <span class="text-danger">Or</span>iental <span class="text-danger">S</span>tate <span class="text-danger">U</span>niversity <br />E-Registrar Kiosk</span></h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
</div>

 
  			</div>
  		
  			<div class="item">
  				<div class="container">
  					hi go
  				</div>
  			</div>

  			<div class="item">
  				<div class="container">
  					hi
  				</div>
  			</div>
  		</div>

  		<!-- Controls -->
  		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
  			<span class="glyphicon glyphicon-chevron-left"></span>
  		</a>
  		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
  			<span class="glyphicon glyphicon-chevron-right"></span>
  		</a>

  </div>


	<div class="modal fade" id="searchStudent">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
					@include('alert')

					<div class="row">
					<div class="col-md-12">
						
						{{ Form::open(['url'=>'app/find-student']) }}

						<div class="col-md-9">
							{{ Form::text('find_key', Input::old('find_key'), ['class'=>'form-control input-lg', 'placeholder'=>'Enter Student ID or NAME']) }}
						</div>

						<div class="col-sm-3">
							{{ Form::submit('Begin',  ['class'=>'form-control btn-danger input-lg']) }}
						</div>

						{{ Form::close() }}

					</div>
					</div>

				</div>

			</div>
		</div>
	</div>

@stop