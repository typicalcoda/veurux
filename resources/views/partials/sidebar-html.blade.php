	<div class="burger">
		<i class="fa fa-bars fa-lg">
			
		</i>
	</div>

	<div class="sidebar">
		<div class="header">
			<img alt="" class="img-circle avatar" src="http://www.sardiniauniqueproperties.com/wp-content/uploads/2015/10/square-profile-pic-2.jpg">
			<div class="lbl-user">
				<span class="big">
					{{ auth()->user()->name }}
				</span>
			</div>
		</div>
		
		<nav>
			<ul>
				<li>
					<a href="/"><i class="fa fa-home fa-fw"></i><span class="big">Dashboard</span></a>
				</li>

				<li>
					<a href="/practices"><i class="fa fa-hospital-o fa-fw"></i><span class="big">Practices</span></a>
				</li>

				<li>
					<a href="/doctors"><i class="fa fa-user-md fa-fw"></i><span class="big">Manage Doctors</span></a>
				</li>

				<li>
					<a href="/pickups"><i class="fa fa-medkit fa-fw"></i><span class="big">Pickup Prescrip.</span><span class="badge" style="background:#ad7a7a">3</span></a>
				</li>

				<li>
					<a href="/clients"><i class="fa fa-address-book fa-fw"></i><span class="big">Clients</span></a>
				</li>

				<li>
					<a href="#"><i class="fa fa-ambulance fa-fw"></i><span class="big">Dispatch</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-male fa-fw"></i><span class="big">Collections</span><span class="badge" style="background:#7aad80">4</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-weixin fa-fw"></i><span class="big">Support</span></a>
				</li>

				<li>
					<a href="#"><i class="fa fa-user fa-fw"></i><span class="big">Manage Users</span></a>
				</li>

				<li>
					<a href="/logout"><i class="fa fa-sign-out fa-fw"></i><span class="big">Logout</span></a>
				</li>
			</ul>
		</nav>
	</div>

