<?php

include_once "../includes/authentication.php";
include_once "../includes/adminauthentication.php";
include "middleware/superadminauth.php";
include "includes/header.php";
include "includes/sidebar.php";
?>
                    <div class="container-fluid px-4">
                            <?php include "includes/message.php"; ?>
                            
                        </ol>
                        <div class="row mt-4">
                            <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4>Add User/Admin
                                    <a href="view_registered" class="btn btn-danger float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                <form action="editcode.php" method="POST">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Role</label>
                                            <select name="usertype" required class="form-control">
                                            <option value="">--Select Role--</option>
                                            <option value="admin" >Admin</option>
                                            <option value="">User</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Phone</label>
                                            <input type="text" name="phone" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br>
                                            <input type="checkbox" name="status"> 
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <button type="submit" class="btn btn-primary" name="adduser">Add User/Admin</button>
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
