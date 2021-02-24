<?php 
include('server.php');
include('layout.php');
head('Register'); // Function put defaul header and assing title Register
?>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html" class="d-block">
              <img src="images/logo.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="index.html" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="about.html" class="nav-link text-left">About Us</a>
                  <ul class="dropdown">
                    <li><a href="teachers.html">Our Teachers</a></li>
                    <li><a href="about.html">Our School</a></li>
                  </ul>
                </li>
                <li>
                  <a href="admissions.html" class="nav-link text-left">Admissions</a>
                </li>
                <li>
                  <a href="courses.html" class="nav-link text-left">Courses</a>
                </li>
                <li>
                    <a href="contact.html" class="nav-link text-left">Contact</a>
                  </li>
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
         
        </div>
      </div>

    </header>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Register</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Register</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">

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
