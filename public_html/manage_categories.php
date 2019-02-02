<?php
include_once("database/constants.php");
if (!isset($_SESSION["user_id"])) {
    header("location:".DOMAIN."/");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inventory Management System</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="./js/manage.js"></script>
    </head>
    <body style="background-color: #f0f0f0;">
        <!-- Navbar -->
        <?php include_once('./templates/header.php'); ?>
        <br/><br/>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Parent</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody id="get_category">
                    <!-- <tr>
                        <td>1</td>
                        <td>Electronics</td>
                        <td>Root</td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm">Active</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash">&nbsp;</i>Delete</a>
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-edit">&nbsp;</i>Edit</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </body>
</html>
