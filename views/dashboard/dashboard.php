<?php
session_start();
if (empty($_SESSION["email"]) && empty($_SESSION["password"])) {
    header("Location: ../../?status=must");
    exit;
}

require "../../routes/dash-route.php";

include $route["dash-includes"]["dash-header"];
include $route["dash-includes"]["dash-nav"];
include $route["dash-includes"]["dash-sidebar"];

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "home";
}

switch ($page) {
    case "home":
        include $route["page"]["home"];
        break;
    case "list":
        include $route["page"]["list"];
        break;
}

include $route["dash-includes"]["dash-footer"];


