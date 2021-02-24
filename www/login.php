<?php include('server.php'); 
include('layout.php');
head('Login');?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Login</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div> 
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
      </div>
    </div>
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
<?php foot();?>
