<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

<!-- Define the page title variables for the title tag in the HTML head section -->
<?php $pageTitle = "Register" ?>

<?php

if(isset($_POST["Submit"])){
  $Username           = $_POST["Username"];
  $Email              = $_POST["Email"];
  $Password           = $_POST["Password"];
  $Confirm_Password   = $_POST["Confirm_Password"];
  //Hash the values in the pasword input field
  $hash               = password_hash($Password, PASSWORD_BCRYPT); 
  date_default_timezone_set("Africa/Lagos");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %I:%M:%p",$CurrentTime);

  // Validation for checking if input fields are empty
  if(empty($Username)||empty($Password)||empty($Email)||empty($Confirm_Password)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("register.php");
  // Validation for password length    
  }elseif (strlen($Password)<4) {
    $_SESSION["ErrorMessage"]= "Password should be greater than 3 characters";
    Redirect_to("register.php");
  // Validation to check if Password and Confirm_Password matches
  }elseif ($Password !== $Confirm_Password) {
    $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
    Redirect_to("register.php");
  // Validation to check if email exists.
  //(the "CheckEmailExistsOrNot" function is being called from "functions.php" in the "inc" folder)
  }elseif (CheckEmailExistsOrNot($Email)) {
    $_SESSION["ErrorMessage"]= "Email Exists. Try Another One! ";
    Redirect_to("register.php");
  //Validation to check if Username exists
  //(the "CheckUserNameExistsOrNot" function is being called from "functions.php" in the "inc" folder)
  }elseif (CheckUserNameExistsOrNot($Username)) {
    $_SESSION["ErrorMessage"]= "Username Exists. Try Another One! ";
    Redirect_to("register.php");
  }else{
    // Query to insert new user in DB if all validations are fine
    global $ConnectingDB;
    $sql = "INSERT INTO users(datetime, Email, Username, Password)";
    $sql .= "VALUES(:dateTime, :eMail, :userName, :passworD)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':eMail',$Email);
    $stmt->bindValue(':userName',$Username);
    $stmt->bindValue(':passworD',$hash);   
    $Execute=$stmt->execute();
    if($Execute){
      $_SESSION["SuccessMessage"]="Registeration Successfully";

      // Automatically login a user after a successful registration
      $Found_Account=Login_Attempt($Username);
      if ($Found_Account && password_verify($_POST["Password"], $Found_Account["Password"])) {
          // Upon login, grab some user details and put them in a session variable
          $_SESSION["UserId"]=$Found_Account["id"];
          $_SESSION["Username"]=$Found_Account["Username"]; 
          // Display a welcome message with the username of the logged in user   
          $_SESSION["SuccessMessage"]= "Welcome " .$_SESSION["Username"]."!";
          if (isset($_SESSION["TrackingURL"])) {
            Redirect_to($_SESSION["TrackingURL"]);            
          }else{
            Redirect_to("user_dashboard.php");
          }
      }     
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("register.php");
    }
  }
} //Ending of Submit Button If-Condition


?>

<!-- Include header start -->
<?php include('inc/header.php'); ?>
<!-- Include header end -->

    <div class="container">

      <div class="text-center mt-5 mb-5">
        <h3>Please Fill in Your details correctly</h3>      
      </div>

      <div class="col-md-6">
                <?php
                    echo ErrorMessage();
                    echo SuccessMessage();                   
                ?>
        <form action="register.php" method="POST">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="Email" type="email" class="form-control" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input name="Username" type="text" class="form-control" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="Password" type="password" class="form-control" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
            <input name="Confirm_Password" type="password" class="form-control" placeholder="name@example.com">
          </div>
          <div class="mb-3">
              <button type="submit" name="Submit" class="btn btn-warning">Register</button>
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