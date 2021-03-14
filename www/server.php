<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors   = array(); 

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
  // if there is any error it will be added to errors array with a code
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "No email format"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) { array_push($errors, "Passwords do not match"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) { array_push($errors, "This username already exists"); }
    if ($user['email'] === $email) { array_push($errors, "This email already exists"); }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, permissions) 
  			  VALUES('$username', '$email', '$password', '$permissions')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['permissions'] = $permissions; 
    header('location: index.php');
  } else {
    // If there is any error a JS code will append a new tag to the form to display the error
	  echo sprintf("<script>alert('%s');</script>",$errors[0]);	
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['pword']);
  
  if (empty($username)) { array_push($errors, "Username or email required"); }
  if (empty($password)) { array_push($errors, "Password required"); }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'";
  	$results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $que_perm = "SELECT permissions FROM users WHERE username='$username' OR email='$username'"; ## REVISAR
      $r_perm = mysqli_query($db, $que_perm); ## REVISAR
      $perm = mysqli_fetch_array($r_perm,0); ## REVISAR

  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['permissions'] = $perm; ## REVISAR 
      header('location: index.php');
  } else {
    // If there is any error a JS code will append a new tag to the form to display the error
	  echo sprintf("<script>alert('%s');</script>",$errors[0]);	
  }
  }
}


// Searching courses

if (isset($_REQUESTS['search'])) {
	if (isset($_REQUEST['assignatura'])) {

		$assign = $_REQUESTS['assignatura'];
		$query = "SELECT id, assignatura, categoria FROM classes where assignatura = '$assign'";
	}elseif(isset($_REQUEST['categoria'])) {

		$cate = $_REQUESTS['categoria'];
		$query = "SELECT id, assignatura, categoria FROM classes where categoria = '$cate'";

	} else {
    		array_push($errors, "You can not perform this action");
	}

  	$results = mysqli_query($db, $query);
	
}
?>
