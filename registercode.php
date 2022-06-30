<?php


require_once 'databases/db_conn.php';
// require_once 'vendor/autoload.php';

// // init configuration
// require_once 'databases/google_config.php';



if(isset($_POST['register'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $country = $_POST['country'];
    $dob = $_POST['dob'];

    $fname = htmlentities($fname);
    $fname = strip_tags($fname);
    $fname = $db->real_escape_string($fname);

    $lname = htmlentities($lname);
    $lname = strip_tags($lname);
    $lname = $db->real_escape_string($lname);

    $email = htmlentities($email);
    $email = strip_tags($email);
    $email = $db->real_escape_string($email);

    $country = htmlentities($country);
    $country = strip_tags($country);
    $country = $db->real_escape_string($country);

    $password = htmlentities($password);
    $password = strip_tags($password);
    $password = $db->real_escape_string($password);
    // $password = md5($password);

    $confirm_password = htmlentities($confirm_password);
    $confirm_password = strip_tags($confirm_password);
    $confirm_password = $db->real_escape_string($confirm_password);
    // $confirm_password = md5($confirm_password);

    $dob = htmlentities($dob);
    $dob = strip_tags($dob);
    $dob = $db->real_escape_string($dob);
    // $created = date("Y-m-d H:i:s");

    if ($password == $confirm_password) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = $db->query("SELECT * FROM users WHERE email='$email'");
        //check if query equal to one
        if ($query->num_rows > 0) {
            echo "Email already exists";
            header("Location: index");
            exit();
        } else {
        //inserting data
        $createquery = $db->query(
            "INSERT INTO users (fname, lname, email, country, password, dob) VALUES('$fname', '$lname', '$email','$country', '$hashed_password', '$dob')"
        );
    
        if($createquery){
        echo "Registration successful";
        header("Location: index");
        exit();
        }
        else{
            echo "Something went wrong!";
            header("Location: logincode.php");
            exit(); 
        }
        exit();
      }
    }
    else{
        echo "Password does not match";
        header("Location: jazz.php");
        exit();

    }
	$db->close();


}


?>