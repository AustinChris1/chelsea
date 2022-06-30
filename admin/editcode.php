<?php

include "../includes/admin_auth.php";


if (isset($_POST["player_delete"])) {
    $post_id = $_POST["player_delete"];
    //2 = deleted
    $postdelete = $db->query(
        "UPDATE players SET status ='2' WHERE id='$post_id' LIMIT 1"
    );

    if ($postdelete) {
        $_SESSION["message"] = "Player Temporarily Deleted successfully";
        header("Location: player");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location: player");
        exit();
    }
}

if (isset($_POST["player_history_delete"])) {
    $post_id = $_POST["player_history_delete"];

    $check_img_query = $db->query(
        "SELECT * FROM players WHERE id ='$post_id' LIMIT 1"
    );
    $imgresdata = $check_img_query->fetch_array();
    $image = $imgresdata["image"];

    $postdelete = $db->query("DELETE FROM players WHERE id = '$post_id' LIMIT 1");

    if ($postdelete) {
        if (file_exists("../uploads/players/" . $image)) {
            unlink("../uploads/players/" . $image);
        }
        $_SESSION["message"] = "Player Deleted successfully";
        header("Location: player");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location: player");
        exit();
    }
}
if (isset($_POST["restore_player"])) {
    $post_id = $_POST["post_id"];
    $status = $_POST["status"] == "0";

    $restore_post = $db->query("UPDATE players SET status='$status'");
    if ($restore_post) {
        $_SESSION["message"] = "Player restored";
        header("location:player");
        exit();
    } else {
        $_SESSION["message"] = "Something went wrong!";
        header("location:player_history");
        exit();
    }
}

if (isset($_POST["player_update"])) {
    $post_id = $_POST["post_id"];
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $number = $_POST["number"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $pob = $_POST["pob"];
    $dob = $_POST["dob"];

    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;

    $description = $_POST["description"];
    $description = htmlentities($description);
    $description = $db->real_escape_string($description);
    $meta_description = $_POST["meta_description"];

    $old_filename = $_POST["old_image"];
    $image = $_FILES["image"]["name"];
    $update_filename = "";

    $old_p_filename = $_POST["old_p_image"];
    $p_image = $_FILES["p_image"]["name"];
    $update_p_filename = "";


    if ($image != null) {
        //rename the image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . "." . $image_extension;

        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }

    if ($p_image != null) {
        //rename the image
        $p_image_extension = pathinfo($p_image, PATHINFO_EXTENSION);
        $p_filename = time() . "profile." . $p_image_extension;

        $update_p_filename = $p_filename;
    }
     else {
        $update_p_filename = $old_p_filename;
    }

    $status = $_POST["status"] == true ? "1" : "0";

    $postupdate = $db->query(
        "UPDATE players SET player_category_id = '$category_id', name = '$name', url = '$slug', description = '$description', image = '$update_filename', p_image = '$update_p_filename', sub_description = '$meta_description', status = '$status', number = '$number', weight = '$weight', height = '$height', birthplace = '$pob', dob = '$dob' WHERE id = '$post_id'");

    if ($postupdate) {
        if ($image != null) {
            if (file_exists("../uploads/players/" . $old_filename)) {
                unlink("../uploads/players/" . $old_filename);
            }
            move_uploaded_file(
                $_FILES["image"]["tmp_name"],
                "../uploads/players/" . $update_filename
            );
        }
        if ($p_image != null) {
            if (file_exists("../uploads/profile/" . $old_p_filename)) {
                unlink("../uploads/profile/" . $old_p_filename);
     }
            move_uploaded_file(
                $_FILES["p_image"]["tmp_name"],
                "../uploads/profile/" . $update_p_filename
            );
        }
        $_SESSION["message"] = "Player Details Updated Successfully";
        header("Location:player_edit?id=" . $post_id);
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:player_edit?id=" . $post_id);
        exit();
    }
}

if (isset($_POST["player_add"])) {
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $number = $_POST["number"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $pob = $_POST["pob"];
    $dob = $_POST["dob"];
    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;
    $status = $_POST["status"] == true ? "1" : "0";

    $description = $_POST["description"];
    $description = htmlspecialchars($description, ENT_QUOTES);
    $description = $db->real_escape_string($description);

    $meta_description = $_POST["meta_description"];

    $image = $_FILES["image"]["name"];
    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . "." . $image_extension;
    
    $p_image = $_FILES["p_image"]["name"];
    //rename the profile image
    $p_image_extension = pathinfo($p_image, PATHINFO_EXTENSION);
    $p_filename = time() . "profile." . $p_image_extension;

    $addpostquery = $db->query("INSERT INTO players (player_category_id, name, url, description, image, p_image, number, sub_description, weight, height, birthplace, dob, status) 
    VALUES('$category_id', '$name', '$slug', '$description', '$filename', '$p_filename', '$number', '$meta_description', '$weight', '$height', '$pob', '$dob', '$status')");

    if ($addpostquery) {
        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "../uploads/players/" . $filename
        );
        move_uploaded_file(
            $_FILES["p_image"]["tmp_name"],
            "../uploads/profile/" . $p_filename
        );
        $_SESSION["message"] = "Player Recruited Successfully";
        header("Location:player_add");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:player_add");
        exit();
    }
}

if (isset($_POST["player_category_update"])) {
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];

    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;

    $description = $_POST["description"];
    $meta_description = $_POST["meta_description"];
    $status = $_POST["status"] == true ? "1" : "0";

    $categoryupdate = $db->query(
        "UPDATE player_category SET name='$name', url='$slug', description='$description', sub_description='$meta_description', status='$status' WHERE id = '$category_id'"
    );

    if ($categoryupdate) {
        $_SESSION["message"] = "Player Category Updated successfully";
        header("Location:player_category_edit?id=".$category_id);
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:player_category_edit?id=".$category_id);
        exit();
    }
}

if (isset($_POST["player_category_add"])) {
    $name = $_POST["name"];

    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;

    $description = $_POST["description"];
    $meta_description = $_POST["meta_description"];
    $status = $_POST["status"] == true ? "1" : "0";

    $categoryquery = $db->query(
        "INSERT INTO player_category (name, url, description, sub_description, status) VALUES('$name', '$slug', '$description', '$meta_description', '$status')"
    );

    if ($categoryquery) {
        $_SESSION["message"] = "Player Category added successfully";
        header("Location:player_category_add");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:player_category_add");
        exit();
    }
}


if(isset($_POST['unblock'])){
    $user_id = $_POST["id"];
    $status == "";
    $deletequery = $db->query("UPDATE users SET status = '$status' WHERE id = '$user_id'");
    if ($deletequery) {
        $_SESSION["message"] = "User unblocked successfully";
        header("Location:users");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:blocked");
        exit();
    }
}

if (isset($_POST["post_delete"])) {
    $post_id = $_POST["post_delete"];
    //2 = deleted
    $postdelete = $db->query(
        "UPDATE posts SET status ='2' WHERE id='$post_id' LIMIT 1"
    );

    if ($postdelete) {
        $_SESSION["message"] = "Post Deleted successfully";
        header("Location: post_view");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location: post_view");
        exit();
    }
}

if (isset($_POST["post_history_delete"])) {
    $post_id = $_POST["post_history_delete"];

    $check_img_query = $db->query(
        "SELECT * FROM posts WHERE id ='$post_id' LIMIT 1"
    );
    $imgresdata = $check_img_query->fetch_array();
    $image = $imgresdata["image"];

    $postdelete = $db->query("DELETE FROM posts WHERE id = '$post_id' LIMIT 1");

    if ($postdelete) {
        if (file_exists("../uploads/posts/" . $image)) {
            unlink("../uploads/posts/" . $image);
        }
        $_SESSION["message"] = "Post Deleted successfully";
        header("Location: post_view");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location: post_view");
        exit();
    }
}
if (isset($_POST["restore_post"])) {
    $post_id = $_POST["post_id"];
    $status = $_POST["status"] == "0";

    $restore_post = $db->query("UPDATE posts SET status='$status'");
    if ($restore_post) {
        $_SESSION["message"] = "Post restored";
        header("location:post_view");
        exit();
    } else {
        $_SESSION["message"] = "Something went wrong!";
        header("location:post_history");
        exit();
    }
}

if (isset($_POST["post_update"])) {
    $post_id = $_POST["post_id"];
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];

    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;

    $description = $_POST["description"];
    $description = $db->real_escape_string($description);

    $meta_description = $_POST["meta_description"];

    $old_filename = $_POST["old_image"];
    $image = $_FILES["image"]["name"];
    $update_filename = "";

    if ($image != null) {
        //rename the image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . "." . $image_extension;

        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }

    $status = $_POST["status"] == true ? "1" : "0";

    $postupdate = $db->query(
        "UPDATE posts SET category_id = '$category_id', name = '$name', url = '$slug', description = '$description', image = '$update_filename', sub_description = '$meta_description', status = '$status' WHERE id = '$post_id'"
    );

    if ($postupdate) {
        if ($image != null) {
            if (file_exists("../uploads/posts/" . $old_filename)) {
                unlink("../uploads/posts/" . $old_filename);
            }
            move_uploaded_file(
                $_FILES["image"]["tmp_name"],
                "../uploads/posts/" . $update_filename
            );
        }
        $_SESSION["message"] = "Post Updated Successfully";
        header("Location:post_edit?id=" . $post_id);
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:post_edit?id=" . $post_id);
        exit();
    }
}

if (isset($_POST["post_add"])) {
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;

    $description = $_POST["description"];
    $description = $db->real_escape_string($description);
    $meta_description = $_POST["meta_description"];
    $image = $_FILES["image"]["name"];
    //rename the image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . "." . $image_extension;
    $status = $_POST["status"] == true ? "1" : "0";

    $addpostquery = $db->query("INSERT INTO posts (category_id, name, url, description, image, sub_description, status) 
    VALUES('$category_id', '$name', '$slug', '$description', '$filename', '$meta_description', '$status')");

    if ($addpostquery) {
        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "../uploads/posts/" . $filename
        );
        $_SESSION["message"] = "Post Created Successfully";
        header("Location:post_add");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:post_add");
        exit();
    }
}

if (isset($_POST["category_update"])) {
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];

    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;

    $description = $_POST["description"];
    $meta_description = $_POST["meta_description"];
    $status = $_POST["status"] == true ? "1" : "0";

    $categoryupdate = $db->query(
        "UPDATE categories SET name='$name', url='$slug', description='$description', sub_description='$meta_description', status='$status' WHERE id = '$category_id'"
    );

    if ($categoryupdate) {
        $_SESSION["message"] = "Category Updated successfully";
        header("Location:category_edit?id=" . $category_id);
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:category_edit?id=" . $category_id);
        exit();
    }
}

if (isset($_POST["category_add"])) {
    $name = $_POST["name"];

    $string = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]); //remove all special chars
    $final_string = preg_replace("/-+/", "-", $string);
    $slug = $final_string;

    $description = $_POST["description"];
    $meta_description = $_POST["meta_description"];
    $status = $_POST["status"] == true ? "1" : "0";

    $categoryquery = $db->query(
        "INSERT INTO categories (name, url, description, sub_description, status) VALUES('$name', '$slug', '$description', '$meta_description', '$status')"
    );

    if ($categoryquery) {
        $_SESSION["message"] = "Category added successfully";
        header("Location:category_add");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:category_add");
        exit();
    }
}

if (isset($_POST["adduser"])) {
    $user_id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $role = $_POST["usertype"];
    $password = $_POST["password"];
    $status = $_POST["status"] == true ? "1" : "0";

    $password = $db->real_escape_string($password);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $checkquery = $db->query(
        "SELECT * FROM users WHERE email='$email' or username='$username'"
    );
    //check if query is greater than 0
    if ($checkquery->num_rows > 0) {
        $_SESSION["message"] = "Username or Email already exists";
        header("Location: register_add");
        exit();
    } else {
        //inserting data
        $addquery = $db->query(
            "INSERT INTO users (fname, lname, email, usertype, password, status) VALUES('$fname', '$lname', '$email', '$role', '$password', '$status')"
        );

        if ($addquery) {
            $_SESSION["message"] = "User added successfully";
            header("Location:users");
            exit();
        } else {
            $_SESSION["message"] = "Something Went Wrong!";
            header("Location:register_add");
            exit();
        }
    }
}

if (isset($_POST["update_user"])) {
    $user_id = $_POST["id"];
    $fname = $_POST["name"];
    $lname = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["usertype"] == true ? "1" : "0";
    $status = $_POST["status"] == true ? "1" : "";

    $editquery = $db->query(
        "UPDATE users SET fname='$fname', lname='$lname', email='$email', usertype='$role', status='$status' WHERE id='$user_id'"
    );

    if ($editquery) {
        $_SESSION["message"] = "Updated Successfully";
        header("Location:users");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:edit_register");
        exit();
    }
}

if (isset($_POST["deleteuser"])) {
    $user_id = $_POST["deleteuser"];

    $deletequery = $db->query("DELETE FROM users WHERE id = '$user_id'");
    if ($deletequery) {
        $_SESSION["message"] = "User deleted successfully";
        header("Location:users");
        exit();
    } else {
        $_SESSION["message"] = "Something Went Wrong!";
        header("Location:users");
        exit();
    }
}
?>
