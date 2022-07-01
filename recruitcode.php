<?php
require_once 'databases/db_conn.php';

if(isset($_POST['recruit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $raddress = $_POST['raddress'];
    $birthplace = $_POST['birthplace'];
    $phone = $_POST['phone'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $dob = $_POST['dob'];
    $url = $fname."-".$lname;

    $fname= $db->real_escape_string($fname);
    $lname= $db->real_escape_string($lname);
    $email= $db->real_escape_string($email);
    $address= $db->real_escape_string($address);
    $raddress= $db->real_escape_string($raddress);
    $birthplace= $db->real_escape_string($birthplace);
    $phone= $db->real_escape_string($phone);
    $height= $db->real_escape_string($height);
    $weight= $db->real_escape_string($weight);
    $gender= $db->real_escape_string($gender);
    $position= $db->real_escape_string($position);
    $country= $db->real_escape_string($country);
    $zip= $db->real_escape_string($zip);
    $state= $db->real_escape_string($state);
    $dob= $db->real_escape_string($dob);
    $url= $db->real_escape_string($url);

    $image = $_FILES["image"]["name"];
    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . "." . $image_extension;

    $id_image = $_FILES["id_image"]["name"];
    //rename the id image
    $id_image_extension = pathinfo($id_image, PATHINFO_EXTENSION);
    $id_filename = time() . "id." . $id_image_extension;

    $med_image = $_FILES["med_image"]["name"];
    //rename the med report image
    $med_image_extension = pathinfo($med_image, PATHINFO_EXTENSION);
    $med_filename = time() . "med." . $med_image_extension;

    $user_id = $_SESSION['auth_user']['id'];
    
        $query = $db->query("INSERT INTO recruits (user_id,fname,lname,email,address,raddress,birthplace,phone,height,weight,gender,position,country,zip,state,dob,image,id_image,med_image,url)
         VALUES('$user_id' ,'$fname', '$lname', '$email', '$address', '$raddress', '$birthplace', '$phone', '$height', '$weight', '$gender', '$position', '$country', '$zip', '$state', '$dob', '$filename', '$id_filename', '$med_filename', '$url')");
    
        if($query){
            move_uploaded_file(
                $_FILES["image"]["tmp_name"],
                "uploads/recruits/" . $filename
            );
            move_uploaded_file(
                $_FILES["id_image"]["tmp_name"],
                "uploads/identity/" . $id_filename
            );
            move_uploaded_file(
                $_FILES["med_image"]["tmp_name"],
                "uploads/medreport/" . $med_filename
            );
        
                echo 'Please proceed to the payment page';
            header("Location:payment");
            exit();
        }
        else{
            echo 'Something went wrong!';
            header("Location:new-players");
            exit();
        }

    }




$db->close();

?>