<?php

    ob_start();
    if(!isset($_SESSION))
    {
        session_start();
    }

    //connection.php
    define('DEBUG', true);
    error_reporting(E_ALL);

    if (DEBUG)
    {
        ini_set('display_errors', 'On');
    }
    else
    {
        ini_set('display_errors', 'Off');
    }

    $base_url = 'https://job.test';

    /**
     * This script connects to MySQL using the PDO object.
     * This can be included in web pages where a database connection is needed.
     * Customize these to match your MySQL database connection details.
     * This info should be available from within your hosting panel.
     */

    $database = "trackcar";
    $host = 'localhost';
    $user = "root";
    $pass = '';

    /**
     * PDO options / configuration details.
     * I'm going to set the error mode to "Exceptions".
     * I'm also going to turn off emulated prepared statements.
     */
    $pdoOptions = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    /**
     * Connect to MySQL and instantiate the PDO object.
     */
    $db = new PDO(
        "mysql:host=" . $host . ";dbname=" . $database.";charset=utf8", //DSN
        $user, //Username
        $pass, //Password
        $pdoOptions //Options
    );

    $db->exec("set names utf8");

    //The PDO object can now be used to query MySQL.

    date_default_timezone_set('Europe/Istanbul');