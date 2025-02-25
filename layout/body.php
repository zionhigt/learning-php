<?php

require "./components/table.php";
require "./components/cards.php";


function add_button (): string {
    return '<a class="btn btn-outline-info" href="/add.php">Ajouter un livre</a>';
}
function build_status_link(string $name, string $display_name, string $color): string
{
    $attribute = '';
    if (!isset($_GET["filter_status"])) {
        if ($name === "*") {
            $attribute = ' disabled';
        }
    } else {
        if ($_GET["filter_status"] === $name) {
            $attribute = ' disabled';
        }
    }
    return '<a class="btn btn-'. $color . $attribute .
            '" href="?'. http_build_query(array_merge((array)$_GET, ["filter_status" => $name])) .'">'
            . $display_name .
            '</a>';
}
function status_filter (): string {
    return '<div class="btn-group">' . 
        build_status_link("read", "Lu", "success") .
        build_status_link("noread", "Non lu", "danger") .
        build_status_link("progress", "En cours", "primary") .
        build_status_link("*", "Tout les livres", "secondary") .
        '</div>';
}

function body (?string $view, array $data): void
{
    require_once './core/web_tools/admin_helper.php';
    $status_translation = [
        "read" => '<span class="badge bg-success">Lu</span>',
        "noread" => '<span class="badge bg-danger">Non lu</span>',
        "progress" => '<span class="badge bg-primary">En cours</span>',
    ];
    echo '<div class="container my-5">';
    echo '<div class="my-3 d-flex justify-content-between">';
    echo status_filter();
    if (isAdmin()) {
        echo add_button();
    }
    echo '</div>';
    switch ($view)
    {
        case "table":
            echo get_table($data, $status_translation);
            break;
        case "book":
            echo get_cards($data, $status_translation);
            break;
        default:
            echo 'Not implemented yet';
    }
    echo '</div>';
}