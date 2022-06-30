<?php
require_once "../databases/db_conn.php";
if (!isset($_SESSION["auth"])) {
    $_SESSION["message"] = "Login To Access Here";
    header("location: ../");
}

if ($_SESSION["auth_role"] == "0") {
    $_SESSION["message"] = "You are not Authorized As Admin";
    header("location: ../");

    exit();
}
?>
