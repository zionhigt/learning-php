<?php

require './logger/index.php';
require './mock/data.php';
require './layout/header.php';
require './layout/body.php';
require './core/models/book.php';

$books = new Books();

body(
    $_GET["view"] ?? array_key_first($menu_list),
    $books->filter(
        function (int $id, array $item): bool {
            $filter = $_GET["filter_status"] ?? "*";

            if (!in_array($filter, ["read", 'noread', "progress"])) {
                $filter = "*";
            }
            if ($filter === "*") {
                return true;
            }
            return $item["status"] === $filter;
        }
    )
);
require './layout/footer.php';
