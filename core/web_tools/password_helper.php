<?php

function _pass_hash (string $password, string $salt): string {
    $hashed = password_hash($password, PASSWORD_BCRYPT, [
        "salt" => $salt,
    ]);
    return $hashed;
}

function pass_hash (string $password): string
{
    return _pass_hash($password, "Never give up !");
}

function pass_verify (?string $password, ?string $hash): bool
{
    if (!$password || !$hash) return false;
    return password_verify($password, $hash);
}