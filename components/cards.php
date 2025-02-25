<?php
function get_card(array $data, array $status_translation): string
{
    $name = $data['name'];
    $description = $data['description'];
    $date = $data['date'];
    $status = $status_translation[$data['status']];
    return <<<HTML
    <div class="card mb-2 w-100 w-md-50 w-lg-30 w-xl-25" style="width: 18rem;height: 100%;">
        <div class="card-body">
            <p>$status<p>  
            <h5 class="card-title">$name</h5>
            <p class="card-text">$description</p>
            <small>$date</small>
        </div>
    </div>
    HTML;
}

function get_cards(array $data, array $status_translation): string
{
    $cards = '<div class="row m-auto">';
    foreach ($data as $book) {
        $cards .= '<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">';
        $cards .= get_card($book->to_array(), $status_translation);
        $cards .= '</div>';
    }
    return $cards . '</div>';
}
