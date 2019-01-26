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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script type="text/javascript" src="js/main.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include_once('./templates/header.php'); ?>
        <br/><br/>
        <div class="container">
            <?php if (!empty($_GET['msg']) && $_REQUEST['msg']) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_GET['msg']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php } ?>
            <div class="card mx-auto" style="width: 25rem;">
                <img src="./images/login.png" style="width:60%;" class="card-img-top mx-auto" alt="Login Icon">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form id="login_form" onsubmit="return false">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter your Email">
                            <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Enter your Password">
                            <small id="p_error" class="form-text text-muted"></small>
                        </div>
                        <button type="submit" class="btn btn-warning btn-lg btn-block login-button"><i class="fas fa-sign-in-alt">&nbsp;</i>Login</button>
                        <div class="card-footer text-center"><a href="#">Forgot your Password?</a></div>
                        <div class="border-top text-center"><br/>Don't have an account? <a href="register.php">Sign Up</a></div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
