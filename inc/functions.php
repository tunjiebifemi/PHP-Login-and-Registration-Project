<?php 

//Redirection Function
function Redirect_to($New_Location){
  header("Location:".$New_Location);
  exit;
}



//Check if a username is taken Function(for registration)
function CheckUserNameExistsOrNot($Username){
  global $ConnectingDB;
  $sql    = "SELECT Username FROM users WHERE Username=:userName";
  $stmt   = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':userName',$Username);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return true;
  }else {
    return false;
  }
}

//Check if a email exists Function(for registration)
function CheckEmailExistsOrNot($Email){
  global $ConnectingDB;
  $sql    = "SELECT Email FROM users WHERE Email=:eMail";
  $stmt   = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':eMail',$Email);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return true;
  }else {
    return false;
  }
}


// Login a user function
function Login_Attempt($Username){
  global $ConnectingDB;
  $sql = "SELECT * FROM users WHERE Email=:userName OR Username =:userName LIMIT 1";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':userName',$Username);
  // $stmt->bindValue(':PassworD',$hash);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return $Found_Account=$stmt->fetch();
  }else {
    return null;
  }
}

// Confirm if a user is logged in
function Confirm_Login(){
if (isset($_SESSION["UserId"])) {
  return true;
}  else {
  $_SESSION["ErrorMessage"]="Login Required !";
  Redirect_to("login.php");
}
}
