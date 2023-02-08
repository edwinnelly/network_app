<!doctype html>
<html lang="en">

<head>
<title>Create an account</title>
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
                            <p class="lead">Create an account</p>
                        </div>
                        <div class="body">
                            <form class="" method="post" id="register">
                                <div class="form-group">
                                    <label class="control-label sr-only">First Name</label>
                                    <input type="text" class="form-control" name="fn" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label sr-only">Last Name</label>
                                    <input type="text" class="form-control" name="ln" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" name="email" id="signup-email" placeholder="Email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="signup-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" name="password" id="signup-password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="signup-password" class="control-label sr-only">Referral Code</label>
                                    <input type="text" class="form-control" name="ref_code" id="signup-password" placeholder="Referral Code">
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" id="add_user" value="Register">
                                <div class="bottom">
                                    <span class="helper-text">Already have an account? <a href="page-login.php">Login</a></span>
                                </div>
                            </form>
                            <div class="separator-linethrough"><span>OR</span></div>
                            <button class="btn btn-signin-social"><i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook</button>
                            <button class="btn btn-signin-social"><i class="fa fa-twitter twitter-color"></i> Sign in with Twitter</button>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/index3.js"></script>

<script src="../assets/vendor/toastr/toastr.js"></script>

<script>
    $(document).ready(function () {
        /* function to login user */
        $("#register").on('submit', (function (e) {
            e.preventDefault();
            var btn = $("#add_user");
            btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> processing");
            let datas = new FormData(this);
            $.ajax({
                url: "script/register",
                type: "POST",
                data: datas,
                contentType: false,
                cache: false,
                processData: false,
                success: (data) => {
                    console.log(data)
                    if (data.trim() == "done") {
                        toastr.success('Completed.', 'Success');
                        setTimeout(
                            function () {
                                window.location.href = 'page-login';
                            }, 2000);
                    } else {

                    }
                },
            });




        }));

    })
</script>
