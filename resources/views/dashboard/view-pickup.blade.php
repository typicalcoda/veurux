@extends('dashboard.master')

@section('links')
<link rel="stylesheet" href="/css/alertify/themes/alertify.core.css">
<link rel="stylesheet" href="/css/alertify/themes/alertify.bootstrap.css">
@endsection

@section('content')


@section('page-title','Pickup Prescriptions')
@section('icon','medkit')


<h3>Updating - Pickup #{{$p->id}}</h3>

<div class="block">

	<div class="profile">
		
		<div class="client">
			<div class="title">Client Information</div>
			<ul class="client-details">

				<li><i class="fa fa-at fa-fw"></i><span><h3 class="span">{{$p->client->fullname}}</h3></span></li>
				<li><i class="fa fa-calendar fa-fw"></i><span>{{$p->client->dob}}</span></li>
				<li><i class="fa fa-phone fa-fw"></i><span>{{$p->client->telephone}}</span></li>
				<li><i class="fa fa-home fa-fw"></i><span>{{$p->client->address}}, {{$p->client->postcode}}</span></li>
			</ul>
		</div>


		<div class="pickup">
			<div class="title">Pickup Information</div>

			<ul class="pickup-details">

				<li><i class="fa fa-at fa-fw"></i><span><h3 class="span">{{$p->client->fullname}}</h3></span></li>
				<li><i class="fa fa-calendar fa-fw"></i><span>{{$p->client->dob}}</span></li>
				<li><i class="fa fa-phone fa-fw"></i><span>{{$p->client->telephone}}</span></li>
				<li><i class="fa fa-home fa-fw"></i><span>{{$p->client->address}}, {{$p->client->postcode}}</span></li>
			</ul>

		</div>
	</div>

</div>

@endsection