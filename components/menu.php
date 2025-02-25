<?php
function menu_item(string $name, string $class_icon, ?bool $active): string
{
    $capitalized_name = ucfirst($name);
    $class = 'nav-link icon-link icon-link-hover';
    $attributes = '';
    if (isset($_GET["view"]) && $name === $_GET["view"] || $active) {
        $class .= " active";
        $attributes = 'aria-current="page"';
    }
    $url = '/index.php?' . http_build_query(array_merge((array)$_GET, ["view" => $name]));
    return <<<HTML
    <li class="nav-item">
        <a class="$class" href="$url" $attributes>$capitalized_name
        <i class="fa-solid $class_icon"></i>
        </a>
    </li>
    HTML;
}
