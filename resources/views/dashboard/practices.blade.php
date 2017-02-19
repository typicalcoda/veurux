@extends('dashboard.master')

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
		
		<div class="block">
			@if($errors->any())
			<div class="alert alert-red ">
				<span data-action="hide-alert" class="exit-alert fa fa-remove"></span>
				<b>Error - </b>{{ $errors->first() }}
			</div>
			@endif
		</div>

		<div class="block">
			<!-- PHP - CONDITIONAL ============================= -->
			<button type="submit" class="btn btn-green">Create</button>
			<button type="button" class="btn btn-default" data-action="clear">Clear</button>
		</div>
	</form>
</div>


<h5>All Practices</h5>

<div class="block">
	<table cellpadding=0 cellspacing=0>
		<tbody>
			<tr>
				<th>Practice Name</th>
				<th>Address</th>
				<th>Postcode</th>
				<th>Telephone</th>
				<th>Options</th>
			</tr>

			@foreach($practices as $p)
			<tr>
				<td>{{$p->name}}</td>
				<td>{{$p->address}}</td>
				<td>{{$p->postcode}}</td>
				<td>{{$p->telephone}}</td>
				<td>
					<button class="btn btn-blue option">
						Edit
					</button>
					<button class="btn btn-red option">
						Delete
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection