<?php
require './logger/index.php';
require './layout/header.php';
require './core/models/users.php';
require "./core/post.php";

$users = new Users();
post_process("login", $users, function (?Exception $error, ?UserEntity $user): void {
    if ($error) {
        echo '<div class="alert alert-danger">'. $error->getMessage() .'</div>';
    } else {
        session_start();
        $_SESSION["connected"] = true;
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
    
    </div>
    <button type="submit" class="btn btn-success mt-3">Se connecter</button>
</form>
</div>

<?php
    require './layout/footer.php';
?>
