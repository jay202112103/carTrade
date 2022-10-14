<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> --}}
	<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v5" style="background-image: url('car3.jpg');background-repeat: no-repeat;background-size: 100% 130%;">
	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" action="{{route('RegisterController.save')}}" method="post">
				@csrf
				<h2>Register Account Form</h2>
				<div class="form-row">
					<label for="your-email">First Name</label>
					<input type="text" name="fname" id="fname" class="input-text" placeholder="Enter first name" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="your-email">Last Name</label>
					<input type="text" name="lname" id="lname" class="input-text" placeholder="Enter last name" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="your-contact">Contact</label>
					<input type="text" name="contact" id="your-contact" class="input-text" minlength = "10" maxlength="10" placeholder="Your Phone number" required>
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="your-state">State</label>
					{{-- <input type="text" name="contact" id="your-contact" class="input-text" minlength = "10" maxlength="10" placeholder="Your Phone number" required> --}}
					<select style="width:580px;height:43px;" name="state_id" id="state" class="form-control" style="margin-top:3px;" required autofocus data-dependent="city">
						<option value="">Please select a state</option>
					  @foreach($states as $state)
						<option value="{{ $state->id }}">{{ $state->name }}</option>
						@endforeach
					  </select>
				
				</div>
				<div class="form-row">
					<br>
					<label for="your-city">City</label>
					{{-- <input type="text" name="contact" id="your-contact" class="input-text" minlength = "10" maxlength="10" placeholder="Your Phone number" required> --}}
					<select style="width:580px;height:43px;" name="city_id"  id="city" class="form-control" style="margin-top:3px;" required >
						{{-- <option value="">Please select a city</option> --}}
					  </select>
					{{-- <i class="fas fa-envelope"></i> --}}
				</div>
				<div class="form-row">
					<br>
					<label for="your-email">Email</label>
					<input type="text" name="email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<br>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row" align="center">
					<input type="submit" name="register" class="register" value="Register">
				</div>
				<div class="form-row-last">
					<a href="{{route('login')}}">Already have an account? Login Here</a>
				</div>
			</form>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
			$('#state').change(function(){
					let state = $('#state option:selected').val();
					if(state !== '') {
						let _token = $('input[name=_token]').val();
						let dependent = $(this).data('dependent');
						$.ajax({
								url : "{{route('RegisterController.getcity')}}",
								method : 'post',
								data : {state:state,_token:_token},
								success: function(data) {
										$('#city').html(data);
								}
						});
					}
			});
	});
</script>
</html>