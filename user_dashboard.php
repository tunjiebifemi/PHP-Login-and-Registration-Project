<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

<!-- Define the page title variables for the title tag in the HTML head section -->
<?php $pageTitle = "User Dashboard" ?>

<?php

$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
// Check if a user is logged in before the page displays
Confirm_Login(); 

?>

<!-- Include header start -->
<?php include('inc/header.php'); ?>
<!-- Include header end -->

    <div class="container">

      <div class="text-center mt-5 mb-5">
        <h2>Welcome <?php echo $_SESSION["Username"]; ?></h2>      
      </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
  </body>
</html>