<?php

$root = "../..";

$route = [];

$route ['dash-includes'] = [
    'dash-header'=> 'includes/dash-header.php',
    'dash-nav'=> 'includes/dash-nav.php',
    'dash-sidebar'=> 'includes/dash-sidebar.php',
    'dash-footer'=> 'includes/dash-footer.php'
];

$route ['page'] = [
    'home'=> 'home.php',
    'list'=> 'contact-list.php'
];

$route ['assets'] = [
    'css'=> $root.'/assets/css/style.css',
    'js'=> $root.'/assets/js/script.js',
    'img'=> $root.'assets/img/',
    'bootstrap'=> 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
    'bootstrap-icons'=> 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
    'bootstrap-js'=> 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    'jquery'=> 'https://code.jquery.com/jquery-3.7.1.min.js',
];