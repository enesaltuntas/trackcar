<?php require_once "inc/conn.php"; ?>
<?php require_once "inc/functions.php"; ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TrackCar - Register</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/web_assets/images/favicon.png">
    <link href="/app_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
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
                                <div class="text-center mb-3">
                                    <img style="max-height: 70px;" src="/web_assets/images/logo.png" alt="">
                                </div>
                                <h4 class="text-center mb-4">Register</h4>

                                <?php if (isset($_GET['err'])) {
                                    if ($_GET['err'] == 1) { ?>
                                        <div class="alert alert-danger text-white text-center">
                                            You need to confirm the recaptcha.
                                        </div>
                                    <?php } elseif ($_GET['err'] == 2) { ?>
                                        <div class="alert alert-danger text-white text-center">
                                            this account ya da email address is already registered.
                                        </div>
                                    <?php }
                                }
                                if (isset($_GET['success'])) { ?>
                                    <div class="alert alert-success text-white text-center">
                                        Your account has been created successfully.
                                    </div>
                                <?php } ?>

                                <form action="/auth/register" method="post">
                                    <?php
                                        if (isset($_GET['ref_code'])) {
                                            $ref_code = base64_decode($_GET['ref_code']);
                                        } else {
                                            $ref_code = '';
                                        }
                                    ?>
                                    <input type="hidden" name="ref_id" value="<?=$ref_code; ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label class="mb-1"><strong>Name</strong></label>
                                            <input name="name" type="text" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label class="mb-1"><strong>Surname</strong></label>
                                            <input name="surname" type="text" class="form-control" placeholder="Surname">
                                        </div>
                                    </div>
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
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Have an account? <a class="text-primary" href="/login">Login</a></p>
                                </div>
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