<?php
include_once("database/constants.php");
if(isset($_SESSION["user_id"])){
    header("location:".DOMAIN."/dashboard.php");
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
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/main.js"></script>
    </head>
    <body>
        <div class="overlay"><div class="loader"></div></div>
        <!-- Navbar -->
        <?php include_once('./templates/header.php'); ?>
        <br/><br/>
        <div class="container">
            <div class="card mx-auto" style="width: 25rem;">
                <div class="card-header">
                    <div class="text-center"><h4>Register</h4></div>
                </div>
                <div class="card-body">
                    <form id="register_form" onsubmit="return false" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Full Name</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your Name">
                            <small id="u_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your Email">
                            <small id="e_error" class="form-text text-muted">We will never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" name="password1" class="form-control" id="password1" placeholder="Enter your Password">
                            <small id="p1_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm your Password">
                            <small id="p2_error" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="usertype">Usertype</label>
                            <select class="form-control" name="usertype" id="usertype">
                                <option value="">Choose User Type</option>
                                <option value="1">Admin</option>
                                <option value="0">Other</option>
                            </select>
                            <small id="t_error" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" name="user_register" class="btn btn-lg btn-success btn-block login-button">
                            <span class="fa fa-user-plus"></span>&nbsp;Register
                        </button>
                        <div class="text-center"><br/>Already have an account? <a href="index.php">Sign In</a></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
