<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>
<?php
$_SESSION["UserId"]=null;
$_SESSION["Username"]=null;
session_destroy();
Redirect_to("login.php");
?>