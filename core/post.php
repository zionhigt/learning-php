<?php

function add_book (Model $model, callable $callback): void
{
    if (
        isset($_POST["name"]) && $_POST["name"] &&
        isset($_POST["description"]) && $_POST["description"] &&
        isset($_POST["status"]) && $_POST["status"]
    )
    {
        $data = [
            "name" => $_POST["name"],
            "description" => $_POST["description"],
            "date" => $_POST["date"] ?? null,
            "status" => $_POST["status"],
        ];
        try {
            $model->create($data);
            $callback(null);
        } catch (Exception $e) {
            $callback($e);
        }
    } else {
       $callback(new Exception('POST process fail: Required field are missing !'));
    }
}

function login (Model $model, callable $callback): void
{
    try {
        if (
            isset($_POST["name"]) && $_POST["name"] &&
            isset($_POST["password"]) && $_POST["password"]
        )
        {
            $data = [
                "name" => $_POST["name"],
                "password" => $_POST["password"],
            ];
            
            $user = $model->get([
                "name" => $data["name"]
            ]);
            if (!$user) {
                throw new Exception("User not found !");
            } else {
                $user_pass = $user->password;
                if (password_verify($data["password"], $user_pass)) {
                    $callback(null, $user);
                } else {
                    throw new Exception('POST process fail: invalid credentials !');
                }
            }
            
        } else {
            throw new Exception('POST process fail: Required field are missing !');
        }
    } catch (Exception $e) {
            $callback($e, null);
    }
}

function post_process(string $type, Model $model, callable $callback): void
{
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        switch ($type) {
            case "add":
                add_book($model, $callback);
                break;
            case "login":
                login($model, $callback);
                break;
        }
    }
}