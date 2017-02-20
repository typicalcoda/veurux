@extends('dashboard.master')

@section('content')


@section('page-title','Doctors')
@section('icon','user-md')



<div class="alert alert-blue">
	<span data-action="hide-alert" class="exit-alert fa fa-remove"></span>
	<p><b>Note - </b>If you need to add a new practice, you may do it <a href="/practices"><b>here</b></a></p>
</div>


<h5>Create Doctor</h5>

<div class="block">	
	<form method="POST" action="/doctors">
		{{ csrf_field() }}
		<div class="input">
			<label for="fullname">Full Name</label>
			<input type="text" id="fullname" name="fullname" required>
		</div>

		<div class="input">
			<label for="practice">Select Practice</label>
			<select id="practice" name="practice" required>
				@if(count($practices))
				@foreach($practices as $p)
				<option>{{$p->name}}</option>
				@endforeach
				@endif
			</select>

		</div>

		<div class="block">
			@if($errors->any())
			@include('partials.errors')
			@endif


			<!-- PHP - CONDITIONAL ============================= -->
			<button type="submit" class="btn btn-green">Create</button>
			<button data-action="clear" type="button" class="btn btn-default">Clear</button>
		</div>
	</form>
</div>



<h5>All Doctors</h5>
<div class="counter">
	Total: {{$doctors->count()}}
</div>
<div class="block">
	<table cellpadding=0 cellspacing=0>
		<tbody>
			<tr>
				<th>Doctor Name</th>
				<th>Practice</th>
				<th>Options</th>
				<th>Select<input data-action="check-all" type="checkbox"></th>
			</tr>

			@foreach($doctors as $d)

			<tr>
				<td>{{ $d->fullname }}</td>
				<td>{{ $d->practice->name }}</td>
				<td>	
					<button class="btn btn-blue option">
						Edit
					</button>
					<button class="btn btn-red option">
						Delete
					</button>
				</td>
				<td><input type="checkbox"></td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>


@endsection