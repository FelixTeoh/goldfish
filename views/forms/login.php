<?php  
	$title = "Login";
	function get_content() {
?>
<div class="container col-md-6 mx-auto py-5" data-aos="flip-up">
	<form class="col-md-6 mx-auto py-5 needs-validation bg-dark text-white" style="padding: 50px 25px; border-radius: 5%; opacity: 0.7;" method="POST" action="/controllers/auth/login.php" novalidate>
	<h2 class="text-center text-white p-h1">Login</h2>
		<div class="mb-3">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" required>
		</div>
		<div class="form-group lr-1">
		<div class="valid-feedback">
		    Looks good!
		</div>
		<div class="invalid-feedback">
		    Please Enter First Name!
		</div>
		</div>
		<div class="mb-3">
			<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" id="myInput" required>
			<input type="checkbox" onclick="myFunction()">Show Password
		</div>
		<div class="form-group lr-1">
		<div class="valid-feedback">
		    Looks good!
		</div>
		<div class="invalid-feedback">
		    Please Enter First Name!
		</div>
		</div>  
		<button class="btn btn-primary mx-auto">Login</button>
	</form>
</div>


<?php  
	}
	require_once '../partials/layout.php';
?>