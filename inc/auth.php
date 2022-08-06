<?php

    require_once "conn.php";
    require_once "functions.php";

    $email    = "";
    $password = "";
    $response = $_POST["g-recaptcha-response"];

    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    $url = 'https://www.google.com/recaptcha/api/siteverify';
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
        header('Location: /login/?err=3');
    } else if ($captcha_success->success==true) {
        $q = 'SELECT * FROM users WHERE email=:email and status = 1';
        $query = $db->prepare($q);
        $query->execute(array(':email' => $email));

        if ($query->rowCount() == 0) {
            header('Location: /login/?err=1');
        } else {

            $row     = $query->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $row['password'])) {

                if ($row['status'] == 0) {
                    header('Location: /login/?step=2');
                }
                elseif ($row['banned'] == 1) {
                    header('Location: /login/?banned=1');
                }
                else {
                    session_regenerate_id();

                    $_SESSION['sess_user_id']   = $row['id'];
                    $_SESSION['sess_user_mail'] = $row['email'];

                    session_write_close();

                    header('Location: /panel');
                }

            } else {
                header('Location: /login/?err=1');
            }

        }
    }