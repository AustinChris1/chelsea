<?php
include_once "../includes/admin_auth.php";
include "includes/header.php";
include "includes/navbar.php";
?>
    <div class="row">
        <div class="col-md-12">
            <?php include "includes/message.php"; ?>
            <div class="card">
                <div class="card-header">
                    <h4>User Details
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Image</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Roles</th>
                                    <th>Date created</th>
                                    <?php if (
                                        $_SESSION["auth_role"] ==
                                        "super"
                                    ) : ?>
                                        <th>Actions</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $regquery = $db->query(
                                    "SELECT * FROM users WHERE status = '1'"
                                );

                                if ($regquery->num_rows > 0) {
                                    foreach ($regquery as $row) { ?>
                                        <tr>
                                            <td><?= $row["id"] ?></td>
                                            <td>
                                                <a href="user_details?id=<?= $row["id"] ?>"><?php
                                                                                            $uimg = $row["user_image"];
                                                                                            if ($uimg != null) { ?>
                                                        <img src="<?= $row["user_image"] ?>" style="border-radius:50%;" width="85px" height="100px" alt="">
                                                </a>
                                            <?php } else { ?>
                                                <a href="user_details?id=<?= $row["id"] ?>" style="text-decoration: none;"> No
                                                    Image Available </a>
                                            <?php }
                                            ?>
                                            </td>

                                            <td><?= $row["fname"] ?></td>
                                            <td><?= $row["lname"] ?></td>
                                            <td><?= $row["email"] ?></td>
                                            <td><?= $row["country"] ?></td>
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
                                            <td><?= $row["created"] ?></td>
                                            <td></td>
                                            <?php if (
                                        $_SESSION["auth_role"] ==
                                        "2"
                                    ) : ?>
                                            <td>
                                                <form action="editcode.php" method="POST">
                                                <input type="hidden" value="<?= $row["id"] ?>" name="id">
                                                    <button type="submit" name="unblock" value="<?= $row["id"] ?>" class="btn btn-success">Unblock</button>
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
        </div>
    </div>

    <?php
    include "includes/footer.php";
    include "includes/scripts.php";


    ?>