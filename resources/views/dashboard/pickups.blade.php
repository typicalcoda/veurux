@extends('dashboard.master')

@section('content')


@section('page-title','Pickup Prescriptions')
@section('icon','medkit')


<h5>Add Pickup</h5>

<div class="block">	
	<form method="POST" action="/pickups">
		{{ csrf_field() }}
		<div class="input">
			<label for="fullname">Full Name</label>
			<input type="text" id="fullname" name="fullname" required>
		</div>

		<div class="input">
			<label for="dob">Date of Birth</label>
			<input type="text" id="dob" name="dob">
		</div>

		<div class="input">
			<label for="address">Address</label>
			<input type="text" id="address" name="address" required>
		</div>

		<div class="input short-input">
			<label for="postcode">Postcode</label>
			<input type="text" id="postcode" name="postcode">
		</div>

		<div class="input">
			<label for="telephone">Telephone</label>
			<input type="text" id="telephone" name="telephone">
		</div>


		<!-- 2nd row of buttons-->
		<div class="block">

			<div class="input">
				<label for="doctor">Doctor</label>
				<select id="doctor" name="doctor" required>
					@foreach($doctors as $d)
					<option value={{$d->id}}>{{$d->fullname}}, {{$d->practice->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="input short-input">
				<label for="repeat">Repeat</label>
				<select id="repeat" name="repeat">
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>
			</div>


			<div class="input">
				<label for="items"># Items</label>
				<input type="text" id="items" name="items">
			</div>

			<div class="input">
				<label for="originator">Originator</label>
				<input type="text" id="originator" name="originator">
			</div>

			<div class="input">
				<label for="collection_date">Collection Date</label>
				<input type="text" id="collection_date" name="collection_date" required>
			</div>

			<!-- Third and final row -->
			<div class="block">

				<div class="input full-input">
					<label for="instructions">Instructions</label>
					<textarea id="instructions" name="instructions"></textarea>
				</div>
			</div>
		</div>

		<div class="block no-pad-top">

			@if($errors->any())
			@include('partials.errors')
			@endif

			<!-- PHP - CONDITIONAL ============================= -->
			<button type="submit" class="btn btn-green">Create</button>
			<button type="button" data-action="clear" class="btn btn-default">Clear</button>
		</div>
	</form>
</div>



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

			<!-- OK so here - you may select a doctor if your filter is a Date i.e. today, this week etc.
			 however, if you select a practice as your filter, you may only select a relevant doctor from that
			 particular practice - as it does not make sense to select a practice with an irrelevant doctor
			 as a filter... further more. If you have selected a doctor, and then wish to view ALL pickups from 
			 a particular practice, without them being filtered by a doctor, simply set it to none-->

			 <div class="input">
			 	<label for="name">Practice</label>
			 	<select>
			 		<option>All</option>
			 		@foreach($practices as $p)
			 		<option value={{$p->id}}>{{$p->name}}</option>
			 		@endforeach
			 	</select>
			 </div>

			 <div class="input">
			 	<label for="name">Doctor</label>
			 	<select>
			 		<option>All</option>
			 		@foreach($doctors as $d)
			 		<option value={{$d->id}}>{{$d->fullname}}</option>
			 		@endforeach
			 	</select>
			 </div>

			 <div class="input">
			 	<button class="btn btn-darkblue">Print</button>
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


			 			@foreach($pickups as $p)
			 			<tr>
			 				<td>{{$p->collection_date}}</td>
			 				<td>{{$p->client->fullname}}</td>
			 				<td>{{$p->client->address}}</td>
			 				<td>{{$p->client->telephone}}</td>
			 				<td>
			 					<strong class="{{$p->status == 'Complete' ? 'green' : 'red'}} stamp">
			 						{{$p->status}}
			 					</strong>
			 				</td>




			 				<td>{{$p->instructions}}</td>
			 				<td>
			 					<button class="btn btn-blue option">edit</button>
			 					<button class="btn btn-red option">delete</button>
			 				</td>

			 				<td><input type="checkbox"></td>
			 			</tr>

			 			@endforeach
			 		</tbody>
			 	</table>
			 </div>




			</div>



			@endsection
