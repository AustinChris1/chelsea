<?php
include 'includes/header.php';
include 'includes/navbar.php';

?>
                        <div class="row">
                            <?php include 'includes/message.php';?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Users
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Date of birth</th>
                                            <th>Role</th>
                                            <th>Verification</th>
                                            <th>Registration Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Date of birth</th>
                                            <th>Role</th>
                                            <th>Verification</th>
                                            <th>Registration Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php
                                            $regquery = $db->query(
                                                "SELECT * FROM users"
                                            );

                                            if ($regquery->num_rows > 0) {
                                                foreach ($regquery as $row) { ?>
                                            <tr>
                                                <td><?= $row["id"] ?></td>
                                                <td>
                                                    <a href="user_details?id=<?= $row["id"] ?>"><?php
                                                    $uimg = $row["user_image"];
                                                    if ($uimg != null) { ?>
                                                    <img src="<?= $row[
                                                        "user_image"
                                                    ] ?>" style="border-radius:50%;" width="85px" height="100px"  alt="">
                                                    </a>
                                                    <?php } else { ?>
                                                        <a href="user_details?id=<?= $row["id"] ?>" style="text-decoration: none;"> No Image Available </a>
                                                        <?php }
                                                    ?>
                                            </td>

                                                <td><?= $row["fname"] ?></td>
                                                <td><?= $row["lname"] ?></td>
                                                <td><?= $row["email"] ?></td>
                                                <td><?= $row["country"] ?></td>
                                                <td><?= $row["dob"] ?></td>
                                                <td>
                                                    <?php if (
                                                        $row["usertype"] ==
                                                        "1"
                                                    ) {
                                                        echo "Admin";
                                                    } elseif (
                                                        $row["usertype"] == "0"
                                                    ) {
                                                        echo "User";
                                                    } elseif (
                                                        $row["usertype"] ==
                                                        "2"
                                                    ) {
                                                        echo "Super Admin";
                                                    } ?>
                                            </td>
                                            <td>
                                                    <?php if (
                                                        $row["verify_status"] ==
                                                        "0"
                                                    ) {
                                                        echo "Unverified";
                                                    } elseif (
                                                        $row["verify_status"] == "2"
                                                    ) {
                                                        echo "Facebook"; 
                                                    } elseif (
                                                            $row["verify_status"] == "1"
                                                        ) {
                                                            echo "Regular";
                                                    } elseif (
                                                        $row["verify_status"] ==
                                                        "3"
                                                    ) {
                                                        echo "Google";
                                                    } ?>
                                            </td>
                                            <td><?= $row["created"] ?></td>

                                                <td><a href="edit_register?id=<?= $row[
                                                    "id"
                                                ] ?>" class="btn btn-secondary">Edit</a></td>
                                                
                                                    <?php if (
                                                        $_SESSION[
                                                            "auth_role"
                                                        ] == "2"
                                                    ): ?>
                                                        <td>
                                                    <form action="editcode.php" method="POST">   
                                                        <button type="submit" name="deleteuser" value="<?= $row[
                                                            "id"
                                                        ] ?>" class="btn btn-danger">Delete</a>
                                                    
                                                    </form>
                                                    </td>
                                                    <?php endif; ?>
                                            </tr>

                                                    <?php }
                                            } else {
                                                 ?>
                                                <tr>
                                                    <td colspan="7">No record found</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
include 'includes/footer.php';
include 'includes/scripts.php'; ?>
    </body>
</html>
