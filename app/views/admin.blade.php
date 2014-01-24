@extends('master')


@section('js')
	
	<script type="text/javascript">

		$(document).ready(function(){

			$(".delete").submit(function(){

				var conf = confirm('Click OK to delete or Cancel to go back!');

				return conf;

			});

		});

	</script>
	
@stop

@section('c')

	<div class="col-md-3">

	
			

<div class="panel-group" id="accordion">
@section('side')

	<div class="list-group">
	  <a data-toggle="collapse" data-parent="#accordion" href="#c1" href="#" class="list-group-item active">
	    Documents
	  </a>

	  <div id="c1" class="collapse {{ Session::get('active') == 'doc' ? 'in' : '' }}">
	 	 <a href="{{ url('/') }}" class="list-group-item">Requested Documents</a>
	 	 <a href="{{ url('/all-request') }}" class="list-group-item">All Requested Documents</a>
	 	 <a href="{{ route('documents.index') }}" class="list-group-item">List of Document Type</a>
	 	 <a href="{{ route('documents.create') }}" class="list-group-item">New Document Type</a>
	  </div>

	</div>

	<div class="list-group">
	  <a data-toggle="collapse" data-parent="#accordion" href="#c2" href="#" class="list-group-item active">
	    Requirements
	  </a>

	  <div id="c2" class="collapse {{ Session::get('active') == 'req' ? 'in' : '' }}">
	 	 <a href="{{ route('requirements.index') }}" class="list-group-item">List Requirements</a>
	 	 <a href="{{ route('requirements.create') }}" class="list-group-item">New Requirement</a>
	  </div>

	</div>

	<div class="list-group">
	  <a data-toggle="collapse" data-parent="#accordion" href="#c3" href="#" class="list-group-item active">
	    Reasons
	  </a>

	  <div id="c3" class="collapse {{ Session::get('active') == 'rea' ? 'in' : '' }}">
	 	 <a href="{{ route('reasons.index') }}" class="list-group-item">List Reasons</a>
	 	 <a href="{{ route('reasons.create') }}" class="list-group-item">New Reason</a>
	  </div>

	</div>
  
	<div class="list-group">
	  <a data-toggle="collapse" data-parent="#accordion" href="#c4" href="#" class="list-group-item active">
	    User Management
	  </a>

	  <div id="c4" class="collapse {{ Session::get('active') == 'user' ? 'in' : '' }}">
	 	 <a href="{{ route('users.index') }}" class="list-group-item">Users</a>
	 	 <a href="{{ route('users.create') }}" class="list-group-item">New User</a>
	  </div>

	</div>

@show
  </div>

	</div>

	<div class="col-md-8">
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title"> 
		    <b>
		    	@section('ht')
		    		{Header Title}
		    	@show
		    </b>
		    </h3>
		  </div>
		  <div class="panel-body">

				@yield('cnt')
		 </div>
		</div>
	</div>

@stop