<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

<!-- Define the page title variables for the title tag in the HTML head section -->
<?php $pageTitle = "Login" ?>

<?php 

// If a user is already logged in, redirect to the User_dashboard Page
if(isset($_SESSION["UserId"])){
  Redirect_to("user_dashboard.php");
}

if (isset($_POST["Login"])) {
  $Username = $_POST["Username"];  
  $Password = $_POST["Password"];
  
  // Validation to check if username and password input fields is empty
  if (empty($Username)||empty($Password)) {
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("login.php");
  }else {

    // code for checking username and password from Database
  
    $Found_Account=Login_Attempt($Username);
    if ($Found_Account && password_verify($_POST["Password"], $Found_Account["Password"])) {

      // Upon login, grab the user details and put them in a session variable
      $_SESSION["UserId"]=$Found_Account["id"];
      $_SESSION["Username"]=$Found_Account["Username"];     
      $_SESSION["SuccessMessage"]= "Welcome ". "<b>".$_SESSION["Username"]."</b>"."!";

      if (isset($_SESSION["TrackingURL"])) {
        Redirect_to($_SESSION["TrackingURL"]);
      }else{
      Redirect_to("user_dashboard.php");
    }
    }else {
      $_SESSION["ErrorMessage"]="Incorrect Username OR Password";
      Redirect_to("login.php");
    }
  }
}

 ?>    


<!-- Include header start -->
<?php include('inc/header.php'); ?>
<!-- Include header end -->

    <div class="container">

      <div class="text-center mt-5 mb-5">
        <h3>Login to Your account</h3>      
      </div>

      <div class="col-md-4 offset-md-4">
                <?php
                // Alert Messages file in session.php file in the "inc" folder
                    echo ErrorMessage();
                    echo SuccessMessage();                   
                ?>
        <form action="login.php" method="POST">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email Or Username</label>
            <input name="Username" type="text" class="form-control" placeholder="name@example.com">
          </div>
         
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="Password" type="password" class="form-control" placeholder="name@example.com">
          </div>
          
          <div class="mb-3">
              <button type="submit" name="Login" class="btn btn-warning">Login</button>
          </div>
        </form>
      </div>        

    </div>   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
    <!-- Custom Javascript file -->
    <script src="inc/app.js"></script>
  </body>
</html>