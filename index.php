<?php

require "routes/route.php";

include $route["includes"]["header"];

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "login-page";
}

switch ($page) {
    case "login-page":
        include $route["page"]["login-page"];
        break;
}

include $route["includes"]["footer"];