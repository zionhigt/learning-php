<?php
require './logger/index.php';
require './core/web_tools/admin_helper.php';
require './core/web_tools/password_helper.php';
require './layout/header.php';
require './core/models/book.php';
require "./core/post.php";

$books = new Books();
// $h = pass_hash("azerty");
// dump($h, pass_verify("azerty", $h));

if (!isAdmin()) {
    http_response_code(403);
    echo '<div class="container"><h1>403 : Unauth</h1></div>';
    die();
}

post_process("add", $books, function (?Exception $error): void {
    if ($error) {
        echo '<div class="alert alert-danger">'. $error->getMessage() .'</div>';
    } else {
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
        <label class="w-100" style="display: block;height:auto;">
            Description :
            <textarea type="text" class="w-100 form-control" style="height: 300px;" name="description" required></textarea>
        </label>
    </div>
    <div class="form-group mb-2">
        <label>
            Date d'édition :
            <input type="date" class="form-control" name="date"/>
        </label>
        <label>
            Status de lecture :
            <select name="status" class="form-control" required>
                <option value="" selected>----Définir un status----</option>
                <option value="read">Lu</option>
                <option value="noread">Non lu</option>
                <option value="progress">En cours</option>
            </select>
        </label>
   
    </div>
    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
</form>
</div>