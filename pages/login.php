<?php

require "./core/web_tools/sessions_helper.php";
require_once './logger/index.php';
require './core/models/users.php';
require "./core/controller/post.php";

$users = new Users();
post_process("login", $users, function (?Exception $error, ?UserEntity $user): void {
    if ($error) {
        echo '<div class="alert alert-danger">'. $error->getMessage() .'</div>';
    } else {
        session();
        $_SESSION["user"] = $user->to_array();
        header("Location: /");
    }
});
?>
<div class="container">
<form action="" method="POST">
    <div class="form-group mb-2">
        <label class="w-50">
            Nom : 
            <input type="text" class="form-control" name="name" required/>
        </label>
    </div>
    <div class="form-group mb-2">
        <label class="w-50">
            Mot de passe : 
            <input type="password" class="form-control" name="password" required/>
        </label>
    </div>
    <button type="submit" class="btn btn-success mt-3">Se connecter</button>
</form>
</div>
