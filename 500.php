<?php
$error_500 = $error_500 ?? "Internal server error";
if ($error_500 instanceof Exception) {
    $error_500 = $error_500->getMessage();
}
http_response_code(500);
?>

<div class="container">
    <h2 class="alert alert-info">
        <?= $error_500 ?>
    </h2>
</div>

<?php die(); ?>