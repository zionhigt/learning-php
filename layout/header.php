<?php
require './components/menu.php';
$menu_list = [
    "table" => 'fa-table',
    "book" => 'fa-book',
]
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="/src/css/style.css">
        <title>Booking a book</title>
    </head>
    <body style="min-height:99vh;">
        <header class="py-5">
            <ul class="nav nav-pills justify-content-center">
                <?php foreach ($menu_list as $item => $icon)
                {
                    $active = false;
                    if (!isset($_GET["view"]) && $item === array_key_first($menu_list)) {
                        $active = true;
                    }
                    echo menu_item($item, $icon, $active);
                }
                ?>
                
            </ul>
        </header>