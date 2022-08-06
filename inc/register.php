<?php

    require_once "conn.php";
    require_once "functions.php";
    require_once "vendor/autoload.php";

    $name     = $_POST['name'];
    $surname  = $_POST['surname'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $url  = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LcDAU0hAAAAADxnCIBNBAKi0ubOmC1B2R8vFqwX',
        'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
        'http' => array (
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);
    if ($captcha_success->success==false) {
        header('Location: /register/?err=1');
    } else if ($captcha_success->success==true) {

        $query = $db->prepare("SELECT * FROM users WHERE email=?");
        $query->execute([$email]);
        $query = $query->fetch();

        if ($query) {
            header("Location: /register/?err=2");
        } else {

            $created_at = date('Y-m-d H:i:s');

            $query = $db->prepare("INSERT INTO users SET
                name = ?,
                surname = ?,
                email = ?,
                password = ?,
                created_at = ?");
            $insert = $query->execute(array(
                $name, $surname, $email, $password, $created_at
            ));
            if ( $insert ){
                $user_id = $db->lastInsertId();

                header("Location: /?success=1");
            }

        }
    }