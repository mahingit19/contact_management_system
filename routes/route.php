<?php

$route = [];

$route ['includes'] = [
    'header'=> 'views/includes/header.php',
    'footer'=> 'views/includes/footer.php'
];

$route ['page'] = [
    'login-page'=> 'views/login/login-page.php',
    'auth'=> 'auth/authentication.php',
    'dashboard'=> 'views/dashboard/dashboard.php',
];

$route ['assets'] = [
    'css'=> 'assets/css/style.css',
    'js'=> 'assets/js/script.js',
    'img'=> 'assets/img/',
    'bootstrap'=> 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
    'bootstrap-icons'=> 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
    'bootstrap-js'=> 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    'jquery'=> 'https://code.jquery.com/jquery-3.7.1.min.js',
];