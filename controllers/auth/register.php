<?php  
require_once '../connection.php';

//sanitize our inputs
$errors = 0;
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
// $address = htmlspecialchars($_POST['address']);
$password = htmlspecialchars($_POST['password']);
$password2 = htmlspecialchars($_POST['password2']);


//all inputs should not be empty
foreach($_POST as $key => $value) {
	if(strlen($value) == 0 && empty($value)) {
		$errors++;		
		die("Please fill out all fields");
	}
}

//username should be greater than 8
if(strlen($username) < 8) {
	echo "Username must be greater than 8 characters";
	$errors++;
}

//password should be greater than 8 characters
if(strlen($password) < 8) {
	echo "Password must be greater than 8 characters";
	$errors++; 
}

//password and confirm password should match
if($password != $password2) {
	echo "Passwords do not match";
	$errors++;
}

//check if the username or email already exists
if($username || $email) {
	$query = "SELECT * FROM users WHERE username = ? OR email = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("ss", $username, $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_all(MYSQLI_ASSOC);
	
	if($user) {
		echo "Username or email already exists";
		$errors++;
		$cn->close();
		$stmt->close();
	}
}

//if $errors still at 0 then we can register
if($errors === 0) {
	$query = "INSERT INTO users (firstname, lastname, username, password, email) VALUES (?, ?, ?, ?, ?)";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("sssss", $firstname, $lastname, $username, password_hash($password, PASSWORD_DEFAULT), $email);
	$stmt->execute();
	$stmt->close();
	$cn->close();

	header("Location: /");
			}

