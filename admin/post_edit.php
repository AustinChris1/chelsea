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
                                    <h4>Edit Posts
                                    <a href="post_view" class="btn btn-primary float-end">View Post</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($_GET["id"])) {
                                        $post_id = $_GET["id"];
                                        $postquery = $db->query(
                                            "SELECT * FROM posts WHERE id= '$post_id' LIMIT 1"
                                        );
                                        if ($postquery->num_rows > 0) {
                                            $postrow = $postquery->fetch_array(); ?>
                                        <form action="editcode.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <?php
                                            $category = $db->query(
                                                "SELECT * FROM categories WHERE status ='0'"
                                            );
                                            if ($category->num_rows > 0) { ?>
                                        <label for="">Category List</label>
                                        <select name="category_id" required class="form-control">
                                            <option value="">--Select Category--</option>
                                            <?php foreach (
                                                $category
                                                as $category_item
                                            ) { ?>
                                                <option value="<?= $category_item[
                                                    "id"
                                                ] ?>"<?= $category_item["id"] ==
$postrow["category_id"]
    ? "selected"
    : "" ?>>
                                                <?= $category_item["name"] ?>
                                            </option>
                                                <?php } ?>
                                        </select>
                                                <?php } else { ?>
                                                <h6>No Category Available</h6>
                                                <?php }
                                            ?>

                                        </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="hidden" name="post_id" value="<?= $postrow[
                                            "id"
                                        ] ?>">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $postrow[
                                                "name"
                                            ] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">URL</label>
                                            <input type="text" name="slug" value="<?= $postrow[
                                                "url"
                                            ] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" required class="form-control" id="summernote"  rows="4"><?= htmlentities(
                                                $postrow["description"]
                                            ) ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="">Sub Description</label>
                                            <textarea name="meta_description" max="191" required class="form-control"  rows="4"><?= $postrow[
                                                "sub_description"
                                            ] ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Image</label>
                                            <input type="hidden" name="old_image" value="<?= $postrow[
                                                "image"
                                            ] ?>" class="form-control"></textarea>
                                            <input type="file" name="image" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                        <label for="">Status</label><br>
                                            <input type="checkbox" name="status" <?= $postrow[
                                                "status"
                                            ] == "1"
                                                ? "checked"
                                                : "" ?> width="70px" height="70px"/> 
                                            Checked = Hidden, UnChecked = Visible
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="post_update">Update Post</button>
                                        </div>
                                    </div>
                                </form>

                                            <?php
                                        } else {
                                             ?>
                                            <h4>No Record Found</h4>

                                            <?php
                                        }
                                    } ?>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        include "includes/footer.php";
                        include "includes/scripts.php";


?>
