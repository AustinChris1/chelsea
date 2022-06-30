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
                                    <h4>Add Players
                                    <a href="player" class="btn btn-primary float-end">View Players</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <form action="editcode.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <?php
                                            $category = $db->query(
                                                "SELECT * FROM player_category WHERE status ='0'"
                                            );
                                            if ($category->num_rows > 0) { ?>
                                        <label for="">Player Category List</label>
                                        <select name="category_id" required class="form-control">
                                            <option value="">--Select Category--</option>
                                            <?php foreach (
                                                $category
                                                as $category_item
                                            ) { ?>
                                                <option value="<?= $category_item[
                                                    "id"
                                                ] ?>"><?= $category_item[
    "name"
] ?></option>
                                                <?php } ?>
                                        </select>
                                                <?php } else { ?>
                                                <h6>No Player Category Available</h6>
                                                <?php }
                                            ?>

                                        </div>
                                    <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug(URL)</label>
                                            <input type="text" name="slug" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" required class="form-control" id="summernote"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="">Meta Description</label>
                                            <textarea name="meta_description" max="191" required class="form-control"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Profile Image</label>
                                            <input type="file" name="p_image" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Player Number</label>
                                            <input type="number" name="number" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Weight</label>
                                            <input type="number" name="weight" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Height</label>
                                            <input type="number" name="height" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Place of birth</label>
                                            <input type="text" name="pob" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Date of birth</label>
                                            <input type="date" name="dob" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status" width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="player_add">Add Player</button>
                                        </div>
                                    </div>
                                </form>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        include "includes/footer.php";
                        include "includes/scripts.php";


?>
