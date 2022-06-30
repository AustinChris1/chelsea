<?php
require_once "databases/db_conn.php";

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = htmlentities($email);
    $email = strip_tags($email);
    $email = $db->real_escape_string($email);

    $password = htmlentities($password);
    $password = strip_tags($password);
    $password = $db->real_escape_string($password);


    $query = $db->query(
        "SELECT * from users WHERE email='$email' LIMIT 1"
    );
    if ($query->num_rows > 0) {
        $loginrow = $query->fetch_array();
        $hash = $loginrow['password'];
    $pass = password_verify($password, $hash);
if ($pass){
        if ($loginrow["verify_status"] == "1") {

            $blocked = $loginrow['status'];
            if ($blocked != 1) {

                foreach ($query as $data) {
                    $user_id = $data["id"];
                    $email = $data["email"];
                    $fname = $data["fname"];
                    $lname = $data["lname"];
                    $usertype = $data["usertype"];
                }

                $_SESSION["auth"] = true;
                $_SESSION["auth_role"] = "$usertype";
                $_SESSION["auth_user"] = [
                    "id" => $user_id,
                    "email" => $email,
                    "fname" => $fname,
                    "lname" => $lname,
                    // 'user_image' => $user_image,
                ];

                if ($_SESSION["auth_role"] == "1") {
                    $_SESSION["message"] =
                        "Hello Admin, Welcome To Dashboard";
                    header("Location: admin/");
                    exit(0);
                } elseif ($_SESSION["auth_role"] == "0") {
                    $_SESSION["message"] = "Login Successful";
                    header("Location: index");
                    exit(0);
                } elseif ($_SESSION["auth_role"] == "2") {
                    $_SESSION["message"] =
                        "Hello Admin, Welcome To Dashboard";
                    header("Location: admin/");
                    exit(0);
                }
            } else {
                $_SESSION["message"] = "You have been blocked";
                header("Location: login");
            }
        } else {
            // $_SESSION['login_attempts'] += 1;
            $_SESSION["message"] =
                "Please verify your email address to login";
            header("Location: login");
            exit();
        }
    }
    else{
        $_SESSION["message"] = "Incorrect Password";
        header("Location: loginaa");
 
    }
    } else {
        $_SESSION["login_attempts"] += 1;
        $_SESSION["message"] = "Incorrect Email";
        header("Location: loginzz");
    }

}

?>