	<div class="wrapper">
		<div class="breadcrumb">
			<span>
				<a href="#">{{auth()->user()->name}}</a> 
				<i class="fa fa-angle-double-right"></i> 
				<a href="#">Dashboard</a>
			</span>
		</div>

		<div class="content">

			<div class="page-title">
				<h4><i class="fa fa-@yield('icon')"></i>@yield('page-title')</h4>
				<hr>
			</div>



			<!-- ======= THIS IS WHERE ALL CONTENT GOES =============-->


				@yield('content')


			<!-- =======  EVERYTHING BELOW THE HEADER   =============-->


		</div>
	</div>