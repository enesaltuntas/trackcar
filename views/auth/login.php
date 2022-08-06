<?php require_once "inc/conn.php"; ?>
<?php require_once "inc/functions.php"; ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TrackCar - Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/web_assets/images/favicon.png">
    <link href="/app_assets/css/style.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
</head>

<body class="vh-100 auth_body">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">

                                <h4 class="text-center mb-4">Sign in your account</h4>

                                <?php
                                    $errors = array(
                                        1=>"Wrong Email or Password, <br> Try again.",
                                        2=>"Please Sign In.",
                                        3=>"You need to confirm the reCAPTCHA.",
                                    );

                                    $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
                                ?>
                                <div style="background-color: #43617d;" class="alert text-white text-center <?php if ($error_id == 1) {} elseif ($error_id == 2) {} elseif ($error_id == 3) {} else { echo "d-none";} ?> mt-3" role="alert">
                                    <?php
                                        if ($error_id == 1) {
                                            echo '<p style="margin: 0;font-size: 16px;">'.$errors[$error_id].'</p>';
                                        }elseif ($error_id == 2) {
                                            echo '<p style="margin: 0;font-size: 16px;">'.$errors[$error_id].'</p>';
                                        }elseif ($error_id == 3) {
                                            echo '<p style="margin: 0;font-size: 16px;">'.$errors[$error_id].'</p>';
                                        }
                                    ?>
                                </div>

                                <?php if (isset($_GET['success'])) { ?>
                                    <div class="alert alert-success text-white text-center">
                                        Your account has been created successfully. <br> You can login now.
                                    </div>
                                <?php } ?>

                                <form action="/auth/login" method="post">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input name="email" type="email" class="form-control" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Password</strong></label>
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="g-recaptcha mb-3" data-sitekey="6LcDAU0hAAAAAI7Owbmx8BRJeN7d6s4gsH-1EMI7"></div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>

                                    <p class="text-center font-weight-bold mt-4">OR</p>

                                    <div class="text-center">
                                        <a href="/register" class="btn btn-primary btn-block">Register</a>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="/app_assets/vendor/global/global.min.js"></script>
<script src="/app_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/app_assets/js/custom.min.js"></script>
<script src="/app_assets/js/deznav-init.js"></script>
</body>

</html>