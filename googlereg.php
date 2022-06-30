<?php
// Google register
require_once 'vendor/autoload.php';
// init configuration
require_once 'databases/db_conn.php';

$clientID = '146233363114-j35hkk99vkfk0nt5csjv17hherpd1i4g.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/chelsea/googlereg';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Google register
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
  
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
      "email" => $google_account_info['email'],
      "fname" => $google_account_info['givenName'],
      "lname" => $google_account_info['familyName'],
      "picture" => $google_account_info['picture'],
      "verifiedEmail" => $google_account_info['verifiedEmail'],
      "token" => $google_account_info['id']
    ];
    
    $googleQuery = $db->query("SELECT * FROM users WHERE email='{$userinfo['email']}'");
    if ($googleQuery->num_rows > 0){
      $loginrow = $googleQuery->fetch_array();
      $blocked = $loginrow['status'];
      if ($blocked != 1) {

          foreach ($googleQuery as $data) {
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
          exit();
      }

    }
    else{
      $createGquery = $db->query(
        "INSERT INTO users (fname, lname, email, user_image, token, verify_status) VALUES('{$userinfo['fname']}', '{$userinfo['lname']}', '{$userinfo['email']}','{$userinfo['picture']}', '{$userinfo['token']}', '3')"
    );
  
    if($createGquery){
    echo "Registration successful";
    // $token = $userinfo['token'];
    header("Location: index.php");
    exit();
    }
    else{
        echo "Something went wrong!";
        header("Location: index.php");
        exit(); 
    }
    exit();
  }
  
  $db->close();
  
}


?>