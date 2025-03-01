<?php

function session (): void {
    if (session_status() === PHP_SESSION_NONE) @session_start();
}