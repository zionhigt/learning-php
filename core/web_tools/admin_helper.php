<?php

require_once "./core/web_tools/sessions_helper.php";

function isAdmin (): bool
{
    session();
    include "./config.php";
    if (!isset($app_config["app"])) {
        error_log("'app' config key must be exists into config file; isAdmin cannot be verified");
        require "./500.php";
    }
    $admin_id = $app_config["app"]["admin_id"];
    return session_status() === PHP_SESSION_ACTIVE &&
            isset($_SESSION["user"]) &&
            $_SESSION["user"]["role_id"]["id"] === $admin_id;
}