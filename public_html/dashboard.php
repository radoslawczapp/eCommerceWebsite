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
        <script type="text/javascript" src="./js/main.js"></script>
    </head>
    <body style="background-color: #f0f0f0;">
        <!-- Navbar -->
        <?php include_once('./templates/header.php'); ?>
        <br/><br/>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mx-auto"></br>
                        <img src="./images/user.png" class="card-img-top mx-auto" alt="Profile Icon" style="width:60%;">
                        <div class="card-body">
                            <h5 class="card-title">Profile Info</h5>
                            <p class="card-text"><i class="fa fa-user">&nbsp;</i>John Doe</p>
                            <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
                            <p class="card-text">Last Login : xxxx-xx-xx</p>
                            <a href="#" class="btn btn-success"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="jumbotron" style="width:100%;height:100%;">
                        <h1>Hello Admin</h1>
                        <div class="row">
                            <div class="col-sm-6">
                                <iframe src="http://free.timeanddate.com/clock/i6lt3qgr/n1449/szw160/szh160/hoc000/hbw1/hfceee/cf100/hncddd/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98/hwm2/hss2" frameborder="0" width="160" height="160"></iframe>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">New orders</h5>
                                        <p class="card-text">Here you can make invoices and create new orders</p>
                                        <a href="#" class="btn btn-info">New orders</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <p></p>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <p class="card-text">Here you can manage your categories, add new parent and sub categories</p>
                            <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                            <a href="#" class="btn btn-warning"><i class="fa fa-edit">&nbsp;</i>Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Brands</h5>
                            <p class="card-text">Here you can manage your brand and also add new brand.</p>
                            <a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                            <a href="#" class="btn btn-warning"><i class="fa fa-edit">&nbsp;</i>Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Products</h5>
                            <p class="card-text">Here you can manage your products and also add new products</p>
                            <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                            <a href="#" class="btn btn-warning"><i class="fa fa-edit">&nbsp;</i>Manage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // Category form
        include_once("./templates/category.php"); ?>
        <?php // Brand form
        include_once("./templates/brand.php"); ?>
        <?php // Products form
        include_once("./templates/products.php"); ?>
    </body>
</html>
