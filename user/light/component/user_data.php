    <?php
    include_once "session.php";
    include_once "controller.php";
    $app = new controller;
    $user_log = $app->checkLogin();
    if ($user_log == "logged") {
        //echo "ok";
    } else {
        echo '<script>window.location.href="./page-login.php";</script>';
    }

    //Get user info
    $userInfo = $app->get_user_data($_SESSION['login_user']);
     $first_name = $userInfo->first_name;
     $account_act = $userInfo->account_act;

if($account_act==0){
    echo '<script>window.location.href="./page-forgot-password";</script>';
}
    
    




