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