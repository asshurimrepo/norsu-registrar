<div class="sidebar-menu">

	
		<header class="logo-env">
		
		<!-- logo -->
		<div class="logo">
			<a href="#">
				{{ HTML::image('neon-x/assets/images/logo-norsu2.png', 'Logo') }}
			</a>
		</div>
		
				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>
						
		
		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>
		
	</header>
		
		<ul id="main-menu" class="">
				<li id="search">
					<form method="get" action="#">
						<input type="text" name="q" class="search-input" placeholder="Search something..." />
						<button type="submit"><i class="entypo-search"></i></button>
					</form>
				</li>

		<li class="active opened active">
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-gauge"></i><span>Dashboard</span></a>
		</li>
		@foreach(Auth::user()->accessLevel()->orderBy('order','desc')->get() as $access)

		<li>
			<a href="../../../neon-x/dashboard/main/index.html"><i class="{{ $access->icon }}"></i><span>{{ $access->name }}</span></a>
		</li>

		@endforeach

		</ul>
		

</div>