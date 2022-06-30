<?php
include "../includes/admin_auth.php";
include "includes/header.php";
include "includes/navbar.php";
?>
                    <div class="container-fluid px-4">
                        </ol>
                        <div class="row mt-4">
                        <?php include "includes/message.php"; ?>

                            <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Player Category
                                    <a href="player_category_view" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <form action="editcode.php" method="POST">
                                    <div class="row">
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
                                            <textarea name="description" id="summernote" required class="form-control"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label for="">Sub Description</label>
                                            <textarea name="meta_description" max="191" required class="form-control"  rows="4"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status" width="70px" height="70px"/> 
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="player_category_add">Save Category</button>
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
