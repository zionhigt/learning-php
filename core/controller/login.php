<?php
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
                $user_pass = $user->password ?? null;
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