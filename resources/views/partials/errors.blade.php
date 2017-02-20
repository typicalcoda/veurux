		<div class="block">
			
			<div class="alert alert-red ">
				<span data-action="hide-alert" class="exit-alert fa fa-remove"></span>
				@foreach ($errors->all() as $err)
				<p><b>Error - </b> {{ $err }}</p>
				@endforeach
			</div>
			
		</div>