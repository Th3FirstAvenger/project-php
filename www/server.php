<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('db', 'administrator', 'admin123', 'elearning');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pword']);
  $password_2 = mysqli_real_escape_string($db, $_POST['pword2']);
  $permissions = mysqli_real_escape_string($db,$_POST['permissions']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, permissions) 
  			  VALUES('$username', '$email', '$password', '$permissions')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['pword']);

  if (empty($username)) {
  	array_push($errors, "Username or email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else{
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// Searching courses

if (isset($_REQUESTS['search'])) {
	if (isset($_REQUEST['assignatura'])){

		$assign = $_REQUESTS['assignatura'];
		$query = "SELECT id, assignatura, categoria FROM classes where assignatura = '$assign'"
	elseif(isset($_REQUEST['categoria'])){

		$cate = $_REQUESTS['categoria'];
		$query = "SELECT id, assignatura, categoria FROM classes where categoria = '$cate'"

	}else{
	
  		array_push($errors, "Petición no permitida...");
	}

  	$results = mysqli_query($db, $query);
	
}
?>

