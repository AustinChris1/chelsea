<?php

require_once 'databases/db_conn.php';
require_once 'vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '542676274070900',
    'app_secret' => '991713af2db66e188e0587e501a7b572',
    'default_graph_version' => 'v14.0'
]);

$helper = $fb->getRedirectLoginHelper();
$loginfb_url = $helper->getLoginUrl("http://localhost/chelsea/LoginFb");


//Facebook Register
// include 'facebook.php';
if(isset($_GET['code'])){
    if(isset($_GET['access_token'])){
    //    $access_token = $_SESSION['access_token'];

    }
    else{
        $access_token = $helper->getAccessToken();
        // $_SESSION['access_token'] = $access_token;
        $fb->setDefaultAccessToken($access_token);
        $graph_response = $fb->get("me?fields=id,email,location,last_name,picture,first_name", $access_token);
        $fb_user = $graph_response->getGraphUser();
        $fb_image = $fb_user['picture']['url'];
        $fb_id = $fb_user['id'];
        $fb_fname = $fb_user['first_name'];
        $fb_lname = $fb_user['last_name'];
        $fb_email = $fb_user['email'];
        $fb_location = $fb_user['location']['name'];

        $facebookQuery = $db->query("SELECT * FROM users WHERE email='$fb_email' LIMIT 1");
        if ($facebookQuery->num_rows > 0) {
            $loginrow = $facebookQuery->fetch_array(); 
            $UpdateToken = $db->query("UPDATE users SET token = '$fb_id', user_image = '$fb_image' WHERE email = '$fb_email' LIMIT 1");

            $blocked = $loginrow['status'];
            if ($blocked != 1) {

                foreach ($facebookQuery as $data) {
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
                header("Location: index");
                exit();
            }
        } else {
            $createFbquery = $db->query(
                "INSERT INTO users (fname, lname, email, user_image, country, token, verify_status) VALUES('$fb_fname', '$fb_lname', '$fb_email', '$fb_image', '$fb_location', '$fb_id', '1')"
            );
          
            if($createFbquery){
            echo "Registration successful";
            // $token = $userinfo['token'];
            header("Location: index");
            exit();
            }
            else{
                echo "Something went wrong!";
                header("Location: index");
                exit(); 
            }
            exit();
          }
        $db->close();
    
    }
}


?>