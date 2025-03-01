<?php

function post_process(string $type, Model $model, callable $callback): void
{
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        switch ($type) {
            case "add_book":
                require "./core/controller/books.php";
                add_book($model, $callback);
                break;
            case "login":
                require "./core/controller/login.php";
                login($model, $callback);
                break;
        }
    }
}