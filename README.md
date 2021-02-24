- [Documentation for PHP Project](#documentation-for-php-project)
  * [Config files](#config-files)
  * [Database config](#database-config)
  * [Forms](#forms)
    + [Relevant code](#relevant-code)
  * [Build this project](#build-this-project)

# Documentation for PHP Project 
**Group Members:** Ernest, Irene, Isaac and Marc 

We are using bootstrap template and we change it to php for make that project.

## Config files
We have one config file called [server.php](www/server.php) this has all php configuration to connect to our database. And we also have for database queries. 

```php
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
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
```

The other important file is [layout.php](www/layoyt.php) this file has the dynamic header and footer. We can use that for manage users sessions.

```php
// That function print header and get title of the web page

function head($title = ''){
	echo '<!DOCTYPE html>
<html lang="en">
<head>
  <title>'.$title.'</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  ...
```

## Database config

We export it the database into file [myDb.sql](dump/myDb.sql)
Database name: elearning
Tables:
- Users

	| Name        	| Type        	|
	|-------------	|-------------	|
	| username :key:| varchar(20) 	|
	| email    :key:| varchar(50) 	|
	| password    	| varchar(32) 	|
	| permissions 	| varchar(15) 	|

- Classes

	| Name        	| Type        	|
	|-------------	|-------------	|
	| id       :key:| int         	|
	| assignatura 	| varchar(50) 	|
	| categoria   	| varchar(50) 	|

- Administradors

	| Name     	| Type        	|
	|----------	|-------------	|
	| username :key:| varchar(20) 	|
	| email    :key:| varchar(50) 	|
	| password 	| varchar(32) 	|



## Forms
### Relevant code

In the Login page we have configured the next code: 

```php
<?php include('server.php'); 
include('layout.php');
// assing header and get title Login
head('Login');?>

...

 <form method="post" action="login.php">
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Username or email</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" id="pword" name="pword" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" value="log in" name="login_user" class="btn btn-primary btn-lg px-5">log in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
// Print footer code
<?php foot();?>
```

In the Register page we have configured the next code: 

```php
<?php 
include('server.php');
include('layout.php');
head('Register'); // Function put defaul header and assing title Register
?>

...

<form class = "form-signin" role = "form" action = "register.php" method = "post">
	    <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control form-control-lg" name="username" pattern="[a-zA-Z0-9]+" value="<?php echo $username; ?>" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
		    <input type="email" id="email" class="form-control form-control-lg" name="email" value="<?php echo $email; ?>" required>
         	</div>
		<div class="col-md-12 form-group">
		    <label for="pword">Password</label>
		    <input type="password" id="pword" name="pword" class="form-control form-control-lg" required>
		</div>
		<div class="col-md-12 form-group">
		    <label for="pword2">Re-type Password</label>
		    <input type="password" id="pword2" name="pword2" class="form-control form-control-lg" required>
		</div>
	    </div>
            <div class="wrap-contact100-form-radio">
                <span class="label-input100">User type:</span>
                    <div class="contact100-form-radio m-t-15">
                            <input class="input-radio100" value="student" id="radio1" type="radio" name="permissions" checked="checke
            d">
                            <label class="label-radio100" for="radio1">
                                    Student
                            </label>
                    </div>
                    <div class="contact100-form-radio">
                            <input class="input-radio100" id="radio2" value="teacher" type="radio" name="permissions">
                            <label class="label-radio100" for="radio2">
                              Teacher
                            </label>
                    </div>
            </div>
<br>

	    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="reg_user" value="Register" class="btn btn-primary btn-lg px-5">Register</button>
			</div>
                    </div>
                </div>
            </div>
    	  </form>              
        </div>
    </div>

<?php foot();?>
```


## Build this project 
 **Requeriments**  
	- :heavy_check_mark: [Docker](https://docs.docker.com/get-docker/)  
        - :heavy_check_mark: [docker-compose](https://docs.docker.com/compose/install/)

```bash
git clone https://github.com/Th3FirstAvenger/docker-lamp.git project-php --recursive
cd project-php
docker-compose up -d
```
