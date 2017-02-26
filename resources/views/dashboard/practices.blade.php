@extends('dashboard.master')

@section('links')
<link rel="stylesheet" href="/css/alertify/themes/alertify.core.css">
<link rel="stylesheet" href="/css/alertify/themes/alertify.bootstrap.css">
@endsection


@section('content')



@section('page-title','Practices')
@section('icon','hospital-o')

<h5>Create Practice</h5>


<div class="block">	

	<form method="POST" action="/practices">
		{{ csrf_field() }}
		<div class="input">
			<label for="name">Practice Name</label>
			<input type="text" id="name" name="name" required>
		</div>

		<div class="input">
			<label for="name">Address</label>
			<input type="text" id="address" name="address">
		</div>
		
		<div class="input short-input">
			<label for="name">Postcode</label>
			<input type="text" id="postcode" name="postcode">
		</div>

		<div class="input">
			<label for="name">Telephone</label>
			<input type="text" id="telephone" name="telephone">
		</div>
		
		@if($errors->any())
		@include('partials.errors')
		@endif

		<div class="block">
			<!-- PHP - CONDITIONAL ============================= -->
			<button type="submit" class="btn btn-green">Create</button>
			<button type="button" class="btn btn-default" data-action="clear">Clear</button>
		</div>
	</form>
</div>


<div>
	<h5>All Practices</h5>
	
	<div class="counter">
		Total:  {{$practices->count()}}
	</div>


	<div class="table">
		<form method="post" action="/practices" class="full-w">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}


			<div data-action="mass-delete" class="table-tools">
				<button type="submit" class="btn btn-red hidden">
					<i class="fa fa-trash fa-fw">

					</i>
				</button>
			</div>



			<table cellpadding=0 cellspacing=0>
				<tbody>
					<tr>
						<th>Practice Name</th>
						<th>Address</th>
						<th>Postcode</th>
						<th>Telephone</th>
						<th>Options</th>
						<th>Select<input data-action="check-all" type="checkbox"></th>

					</tr>

					@foreach($practices as $p)
					<tr>
						<td>{{$p->name}}</td>
						<td>{{$p->address}}</td>
						<td>{{$p->postcode}}</td>
						<td>{{$p->telephone}}</td>
						<td>
							<a href=""><button class="btn btn-blue option">edit</button></a>
							<a data-action="confirm-box" href="/practices/delete/{{$p->id}}">
								<button class="btn btn-red option" data-chosen="{{$p->name}}">delete</button>
							</a> 
						</td>
						<td>
							<input data-type="cb-selector" name="practices[{{$p->id}}]" type="checkbox">
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>
@endsection

@section('scripts')

<script src="js/alertify/alertify.min.js"></script>

@endsection