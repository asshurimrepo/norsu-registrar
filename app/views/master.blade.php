<!DOCTYPE html>
<html>
<head>
	<title>{{ isset($title) ? $title : 'Welcome to E Registrar Request System' }}</title>

{{ HTML::style('bootstrap/css/bootstrap.css') }}
{{-- HTML::style('bootstrap/css/bootstrap-theme.css') --}}
{{ HTML::style('datatables/css/datatables.css') }}
{{ HTML::style('steps/jquery.steps.css') }}
<!-- {{ HTML::style('datatables/css/bootstrap.min.css') }} -->

<style type="text/css">
	
	body { padding-top: 70px; }

</style>

@section('css')
	


@show

</head>
<body>


<header>
	
	<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}">NORSU E-Registrar</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

  @yield('menu')
   
   @if(Auth::check())

   	<ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->fullName() }} - {{ Auth::user()->username }} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{ url('auth/logout') }}">Logout</a></li>
        </ul>
      </li>
    </ul>

   @endif
  	
  </div><!-- /.navbar-collapse -->
</nav>

</header>

<div class="container">

@section('alert')
	@include('alert')
@show
	
	<div class="row">
		
		@yield('c')	

	</div>


</div>

{{ HTML::script('jquery.js') }}
{{ HTML::script('bootstrap/js/bootstrap.js') }}
{{ HTML::script('datatables/js/jquery.dataTables.min.js') }}
{{ HTML::script('datatables/js/datatables.js') }}
{{ HTML::script('steps/jquery.steps.min.js') }}
<script type="text/javascript">
  
  $(document).ready(function() {
   $('.datatable').dataTable({
      "sPaginationType": "bs_full"
    });

   $('.tip').tooltip();

   $('.datatable').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
      });

   $(".wizard").steps({
      stepsOrientation: "vertical", 
       transitionEffect: "slideLeft",
        headerTag: "h1",
        bodyTag: "div"
     });

  });



</script>

@section('js')
	
@show

</body>
</html>