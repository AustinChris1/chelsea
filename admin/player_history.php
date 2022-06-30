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
                                    <h4>Post History
                                    <a href="player" class="btn btn-primary float-end">View Players</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Restore</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // $posts = $db->query("SELECT * FROM posts WHERE status !='2'");
                                                $posts = $db->query(
                                                    "SELECT p.*, c.name AS cname FROM players p, player_category c WHERE c.id = p.player_category_id AND p.status = '2'"
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
                                            <td><?= $post["status"] == "1"
                                                ? "Hidden"
                                                : "Visible" ?></td>

                                            <td><form action="editcode.php" method="post">
                                            <button type="submit" name="restore_player" value="<?= $post[
                                                "id"
                                            ] ?>" class="btn btn-warning">Restore</button>
                                            </form>
                                            </td>
                                                <td>
                                                    <a href="post_edit?id=<?= $post[
                                                        "id"
                                                    ] ?>" class="btn btn-info">Edit</a>
                                                </td>
                                                <td><form action="editcode.php" method="post">
                                            <button type="submit" name="player_history_delete" value="<?= $post[
                                                "id"
                                            ] ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                            </td>

                                                </tr>

                                                        <?php }
                                                } else {
                                                     ?>
                                                <tr>
                                                    <td colspan="6">No Deleted History Available</td>
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
