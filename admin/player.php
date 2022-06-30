<?php
include "../includes/admin_auth.php";
include "includes/header.php";
include "includes/navbar.php";

?>
                    <div class="container-fluid px-4">
                            
                        </ol>
                        <div class="row mt-4">
                            <div class="col-md-12">
                            <?php include "includes/message.php"; ?>

                            <div class="card">
                                <div class="card-header">
                                    <h4>View Players
                                    <a href="player_add" class="btn btn-primary float-end">Add Players</a>
                                    <a href="player_history" class="btn btn-primary float-end">History</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Player Category</th>
                                                <th>Image</th>
                                                <th>Profile Image</th>
                                                <th>Player number</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // $posts = $db->query("SELECT * FROM posts WHERE status !='2'");
                                                $posts = $db->query(
                                                    "SELECT p.*, c.name AS cname FROM players p, player_category c WHERE c.id = p.player_category_id AND p.status != '2'"
                                                );
                                                if ($posts->num_rows > 0) {
                                                    foreach (
                                                        $posts
                                                        as $post
                                                    ) { ?>
                                                <tr>
                                                <td><?= $post["id"] ?></td>
                                                <td><?= $post["name"] ?></td>
                                                <td><?= $post["cname"] ?></td>
                                                <td>
                                                    <img src="../uploads/players/<?= $post[
                                                        "image"
                                                    ] ?>" width="60px" height="60px" alt="">
                                            </td>
                                            <td>
                                                    <img src="../uploads/profile/<?= $post[
                                                        "p_image"
                                                    ] ?>" width="60px" height="60px" alt="">
                                            </td>
                                            <td><?= $post["number"]?></td>
                                                <td><?= $post["status"] == "1"
                                                    ? "Hidden"
                                                    : "Visible" ?></td>
                                                <td>
                                                    <a href="player_edit?id=<?= $post[
                                                        "id"
                                                    ] ?>" class="btn btn-info">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="editcode.php" method="POST">
                                                    <button type="submit" name="player_delete" value="<?= $post[
                                                        "id"
                                                    ] ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                                </td>
                                                </tr>

                                                        <?php }
                                                } else {
                                                     ?>
                                                <tr>
                                                    <td colspan="7">No Record Found</td>
                                                </tr>

                                                    <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        include "includes/footer.php";
                        include "includes/scripts.php";


?>
