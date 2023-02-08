<?php
//session_start();
include_once "component/controller.php";
//call class
$apps = new controller;
?>
<!doctype html>
<html lang="en">

<head>
    <title>:: Lucid :: Login</title>
    <?php
    include_once "component/style.php";
    ?>
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                <div class="top">
                        <img src="../assets/images/Naturcrystal logo png.png" alt="Naturcrystal" style="height: 100px;">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Login</p>
                        </div>
                        <div class="body">

                            <?php

                            if(isset($_POST['auth_user'])){
                                @$email = $apps->post_request('email');
                                @$password = sha1($apps->post_request('password'));
                                $login = $apps->auth_users($email, $password);
                                if($login == 'success'){
                                    $URL = "user-dir";
                                    echo "<script>location.href='$URL'</script>";
                                }else{
                                    echo "<br>";
                                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="alert-message">
                                    <strong>Hello there!</strong> The login details is incorrect!
                                </div>

                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                                }

                            }
                            ?>
                            <form class="form-auth-small" method="post">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style=" width:15px; height:15px;">
                                    <label class="form-check-label font-weight-normal text-black-50" for="flexCheckDefault" style="margin-top:2px">
                                        Remember Me
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="auth_user">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.php">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="page-register.php">Register</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>
