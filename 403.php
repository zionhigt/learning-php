<?php
$error_403 = $error_403 ?? "Permission denied !";
$isPageError = false;
if ($error_403 instanceof Exception) {
    $error_403 = $error_403->getMessage();
    $isPageError = true;
    http_response_code(403);
}
?>

<div class="container">
    <?php if ($isPageError): ?>
        <h2 class="alert alert-danger">
            <?= $error_403 ?>
        </h2>
        <?php die(); ?>
    <?php else: ?>
        <div class="alert alert-danger">
            <?= $error_403 ?>
        </div>
    <?php endif ?>
</div>