
      <?php
      	session_start();

      include 'config/dbconn.php'; ?>
    

 <!--Connect to a session.
  //session_start();
//$errors = $_SESSION["errors"];


  // Retrieve formVars array from session file
  //$formVars = $_SESSION["formVars"];-->
 


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign in </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/diamond.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>

<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card-body py-5 px-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
        <?php if(isset($_SESSION['message'])){?>
        
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <? =$_SESSION['message'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php

        unset($_SESSION['message']);
        }
        ?>
        
          <h2 class="fw-bold mb-5">Sign up </h2>
		  
		  
          <form  action="authcode.php" method="POST">
		  
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
				<h4><font color=RED><?php if(isset($errors["username"])) 
		echo $errors["username"]."<br>"; ?></font></h4>
                  <input type="text" id="form3Example1" class="form-control"  name="username" placeholder="Username" ><!-- automatically filled!-->
                </div>
              </div>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" name="email" placeholder="Email"   />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Password"   />
            </div>
            <!--
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" name="cpassword" placeholder="Confirm Password"  required />
            </div>
            -->

            
            <!-- Submit button 
            <button type="submit" class="btn btn-primary btn-block mb-4" value="Signup">
              Sign up
            </button>
									//<input id="button" type="submit" value="Signup" name="signup"><br><br>
-->
						<button type="submit" class="btn btn-primary btn-block btn-flat" name="register_btn"><i class="fa fa-pencil"></i> Sign Up</button>

                       <p>Already have an account? <a href="login.html" class="link-info">Log in</a></p>

          </form>
		 
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Design Block -->
    </body>
</html>