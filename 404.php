<?php
$error_404 = $error_404 ?? "Not found";
if ($error_404 instanceof Exception) {
    $error_404 = $error_404->getMessage();
}
http_response_code(404);
?>

<div class="container">
    <h2 class="alert alert-warning">
        <?= $error_404 ?>
    </h2>
</div>

<?php die(); ?>