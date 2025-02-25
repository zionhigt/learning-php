<?php

function rand_date_string (int $min = 946684800, int $max = 1704067200): string
{
    return date("D d m Y", rand_date($min, $max));
}
function rand_date (int $min = 946684800, int $max = 1704067200): int
{
    return rand($min, $max);
}
$data = [
    [
        'name' => "Harry Potter à l'école des sorciers",
        'description' => "Tout commence dans un placard à balais",
        'date' => rand_date(), // Timestamp entre 2000 et 2024
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "Le Seigneur des Anneaux : La Communauté de l'Anneau",
        'description' => "Un anneau pour les gouverner tous...",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "1984",
        'description' => "Big Brother vous surveille...",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "Les Misérables",
        'description' => "L'histoire de Jean Valjean et de la misère en France",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "Dune",
        'description' => "Un désert, une épice et un empire galactique",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "Fahrenheit 451",
        'description' => "Quand lire devient un crime",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "L'étranger",
        'description' => "Meursault face à l'absurdité de la vie",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "Le Petit Prince",
        'description' => "On ne voit bien qu'avec le cœur",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "Crime et Châtiment",
        'description' => "Raskolnikov et la culpabilité",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
    [
        'name' => "Don Quichotte",
        'description' => "Un chevalier errant face aux moulins à vent",
        'date' => rand_date(),
        'status' => ['read', 'progress', 'noread'][array_rand(['read', 'progress', 'noread'])],
    ],
];

