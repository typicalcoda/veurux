@extends('dashboard.master')

@section('links')
<link rel="stylesheet" href="/css/alertify/themes/alertify.core.css">
<link rel="stylesheet" href="/css/alertify/themes/alertify.bootstrap.css">
@endsection


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
	<form method="post" action="/doctors" class="full-w">
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
						<a href=""><button class="btn btn-blue option">edit</button></a>
						<a data-action="confirm-box" href="/doctors/delete/{{$d->id}}">
							<button class="btn btn-red option" data-chosen="{{$d->fullname}}">delete</button>
						</a> 
					</td>
					<td>
						<input data-type="cb-selector" name="doctors[{{$d->id}}]" type="checkbox">
					</td>
				</tr>

				@endforeach
			</tbody>
		</table>
	</form>
</div>


@endsection

@section('scripts')

<script src="js/alertify/alertify.min.js"></script>

@endsection