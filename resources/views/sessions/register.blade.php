<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Veurux Application</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


	<div class="box">
		<div class="header">
			<img width=50 src="http://seeklogo.com/images/F/food-orange-logo-5828D94017-seeklogo.com.png" alt="">
			<div class="title">LOGIN</div>
		</div>
		
		@if($errors->any())
		<p class="error">{{ $errors->first() }}</p>
		@endif
		<form method="POST" action="/register">
			{{ csrf_field() }}
			<div class="inputs">
				<div class="input">
					<i class="fa fa-pencil fa-fw"></i>
					<input type="text" placeholder="name" name="name">
				</div>

				<div class="input">
					<i class="fa fa-envelope fa-fw"></i>
					<input type="text" placeholder="Email" name="email">
				</div>

				<div class="input">
					<i class="fa fa-lock fa-fw"></i>
					<input type="password" placeholder="Password" name="password">
				</div>
			</div>

			<button type="submit">Login</button>
			<a href="/register">
				<button type="button">Register</button>
			</a>
			
		</form>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="responsive.js"></script>
</body>
</html>