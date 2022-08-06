<?php

    require './vendor/autoload.php';

    if (isset($_SESSION['sess_user_id'])) {
        $active_user = $db->prepare("SELECT * FROM users WHERE id=?");
        $active_user->execute([$_SESSION['sess_user_id']]);
        $active_user = $active_user->fetch();
    }

    $currenct_path = $_SERVER['REQUEST_URI'];
    if (strpos($currenct_path, 'panel') !== false || strpos($currenct_path, 'parity') !== false) {
        if (!$_SESSION['sess_user_id']) {
            header('Location: /login/?err=2');
            exit();
        }
    }
    if (strpos($currenct_path, 'login') !== false || strpos($currenct_path, 'register') !== false) {
        if (isset($active_user)) {
            header('Location: /panel');
            exit();
        }
    }

    function gravatar($email = '') {
        $email = md5(strtolower(trim($email)));
        $gravurl = "http://www.gravatar.com/avatar/$email?s=60";
        return $gravurl;
    }