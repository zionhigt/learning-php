<?php
function isAdmin (): bool
{
    session_start();
    $admin_id = 1;
    return $_SESSION["connected"] && $_SESSION["user"]["role_id"] === $admin_id;
}