<?php
session_start();

unset($_SESSION["auth"]);
unset($_SESSION["access_token"]);
unset($_SESSION["auth_role"]);
unset($_SESSION["auth_user"]);
// $_SESSION["message"] = "You have logged out successfully";

session_destroy();
header("Location: index");

?>
