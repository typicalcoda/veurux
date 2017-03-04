@extends('dashboard.master')

@section('links')
<link rel="stylesheet" href="/css/alertify/themes/alertify.core.css">
<link rel="stylesheet" href="/css/alertify/themes/alertify.bootstrap.css">
@endsection

@section('content')


@section('page-title','Pickup Prescriptions')
@section('icon','medkit')


<h5 id="title">Add Pickup</h5>

<div class="block">	
	<form method="POST" action="/pickups" id="editable">
		{{ csrf_field() }}
		
		<!-- 1st row of fields -->
		<div class="block">
			<div class="input">
				<label for="fullname">Full Name</label>
				<input type="text" editable-id="1" id="fullname" name="fullname" required>
			</div><!--

			--><div class="input">
				<label for="dob">Date of Birth</label>
				<input type="text" editable-id="2" id="dob" name="dob">
			</div><!--

			--><div class="input">
				<label for="address">Address</label>
				<input type="text" editable-id="3" id="address" name="address" required>
			</div><!--

			--><div class="input">
				<label for="postcode">Postcode</label>
				<input type="text" editable-id="4" id="postcode" name="postcode">
			</div><!--

			--><div class="input">
				<label for="telephone">Telephone</label>
				<input type="text" editable-id="5" id="telephone" name="telephone">
			</div>
		</div>


		<!-- 2nd row of buttons-->
		<div class="block">

			<div class="input">
				<label for="doctor">Doctor</label>
				<select id="doctor_id" editable-id="6" name="doctor_id" required>
					@if(isset($doctors))
					@foreach($doctors as $d)
					<option value={{$d->id}}>{{$d->fullname}}, {{$d->practice->name}}</option>
					@endforeach
					@endif
				</select>
			</div><!--

			--><div class="input">
				<label for="repeat">Repeat</label>
				<select id="repeat" editable-id="7" name="repeat">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</div><!--


			--><div class="input">
				<label for="items"># Items</label>
				<input type="text" editable-id="8" id="items" name="items">
			</div><!--

			--><div class="input">
				<label for="originator">Originator</label>
				<input type="text" editable-id="9" id="originator" name="originator">
			</div><!--

			--><div class="input">
				<label for="collection_date">Collection Date</label>
				<input type="text" editable-id="10" id="collection_date" name="collection_date" required>
			</div>
		</div>

		<div class="block">
			<div class="input full-input">
				<label for="instructions">Instructions</label>
				<input type="text" editable-id="11" id="instructions" name="instructions" required>
			</div>
		</div>

		<!-- Third and final row -->


		<div class="block">

			@if($errors->any())
			@include('partials.errors')
			@endif

			<!-- PHP - CONDITIONAL ============================= -->
			<button type="submit" id="btnSubmit" class="btn btn-green">Create</button>
			<button type="button" id="btnClear" class="btn btn-default">Clear</button>
		</div>
	</form>
</div>


<div class="block">
	<h5>All Pickup Prescriptions</h5>

	@if(isset($pickups))
	<div class="counter">
		Total: {{$pickups->count()}}
	</div>
	@endif

	<div class="input short-input">
		<label for="name">Time</label>
		<select>
			<option>All</option>
			<option>Today</option>
			<option>This week</option>
			<option>This month</option>
			<option>This year</option>
		</select>
	</div>

	<div class="input short-input">
		<label for="name">Status</label>
		<select>
			<option>All</option>
			<option>Complete</option>
			<option>Incomplete</option>
		</select>
	</div>

	<div class="input">
		<label for="name">Practice</label>
		<select>
			<option>All</option>
			@if(isset($pickups))
			@foreach($practices as $p)
			<option value={{$p->id}}>{{$p->name}}</option>
			@endforeach
			@endif
		</select>
	</div>

	<div class="input">
		<label for="name">Doctor</label>
		<select>
			<option>All</option>
			@if(isset($doctors))
			@foreach($doctors as $d)
			<option value={{$d->id}}>{{$d->fullname}}</option>
			@endforeach
			@endif
		</select>
	</div>



	<div class="block">
		<form method="post" action="/pickups" class="full-w">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}


			<div data-action="mass-delete" class="table-tools">
				<button type="submit" class="btn btn-red hidden"><i class="fa fa-trash fa-fw"></i></button>
				<button type="button" class="btn btn-blue"><i class="fa fa-print fa-fw"></i></button>
			</div>

			<div class="block">
				<table cellpadding=0 cellspacing=0>
					<tbody>
						<tr>
							<th>Collection Date</th>
							<th>Name</th>
							<th>Full Address</th>
							<th>Telephone</th>
							<th>Status</th>
							<th width=20%>Instructions</th>
							<th>Options</th>
							<th>Select<input data-action="check-all" type="checkbox"></th>
						</tr>

						@if(isset($pickups))
						@foreach($pickups as $p)
						<tr>
							<td>{{$p->collection_date}}</td>
							<td>{{$p->client->fullname}}</td>
							<td>{{$p->client->address}}</td>
							<td>{{$p->client->telephone}}</td>
							<td>
								<strong class="{{$p->status == 'Complete' ? 'green' : 'red'}} stamp noselect">
									{{$p->status}}
								</strong>
							</td>




							<td>{{ str_limit($p->instructions, 29) }}</td>
							<td>
								<a data-action="edit" id={{$p->id}}><button type="button" class="btn btn-blue option">edit</button></a>
								<a data-action="confirm-box" href="/pickups/delete/{{$p->id}}">
									<button class="btn btn-red option" type="submit" data-chosen="{{$p->collection_date}} for {{$p->client->fullname}}">delete</button>
								</a> 
							</td>
							<td>
								<input data-type="cb-selector" name="pickups[{{$p->id}}]" type="checkbox">
							</td>
						</tr>

						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</form>
	</div>


	@endsection

	@section('scripts')
	<script src="js/alertify/alertify.min.js"></script>

	<script>
		var phpdata = JSON.parse("<?php echo addslashes(json_encode($pickups)); ?>");
		var objects = [];

		for (var i = 0; i < phpdata.length; i++) {

			delete phpdata[i].client.id;
			delete phpdata[i].client.updated_at;
			delete phpdata[i].client.created_at;

			delete phpdata[i].client_id;
			delete phpdata[i].created_at;
			delete phpdata[i].updated_at;


			var object = {

				"0" : phpdata[i].id,
				"1" : phpdata[i].client.fullname,
				"2" : phpdata[i].client.dob,
				"3" : phpdata[i].client.address,
				"4" : phpdata[i].client.postcode,
				"5" : phpdata[i].client.telephone,
				"6" : phpdata[i].doctor_id,
				"7" : phpdata[i].repeat,
				"8" : phpdata[i].no_items,
				"9" : phpdata[i].originator,
				"10" : phpdata[i].collection_date,
				"11" : phpdata[i].instructions,

			}
			objects.push(object);
		}
		console.log(objects);





	</script>
	@endsection