<?php

    // Autoload files using composer
    require_once __DIR__ . '/vendor/autoload.php';

    // Use this namespace
    use Steampixel\Route;

    // Add your first route
    Route::add('/', function() {
        include "views/auth/login.php";
    });

    Route::add('/auth/register', function() {
        include "inc/register.php";
    },'post');

    Route::add('/auth/login', function() {
        include "inc/auth.php";
    },'post');

    Route::add('/auth/logout', function() {
        include "inc/logout.php";
    });

    Route::add('/login', function() {
        include "views/auth/login.php";
    });

    Route::add('/register', function() {
        include "views/auth/register.php";
    });

    Route::add('/panel', function() {
        include "views/panel/index.php";
    });

    // Run the router
    Route::run('/');