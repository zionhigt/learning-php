<?php
function get_row(array $data, string $type = "td"): string
{
    $row = '<tr>';
    foreach ($data as $d) {
        $row .= "<$type>$d</$type>";
    }
    return $row . '</tr>';
}

function get_table(array $data, array $status_translation): string
{
    $table = '<table class="table table-striped table-hover">';
    $headers = [];
    $body = [];
    foreach ($data as $item) {
        $d = $item->to_array();
        $row = [];
        foreach ($d as $k => $v) {
            if (!in_array(ucfirst($k), $headers)) {
                $headers[] = ucfirst($k);
            }
            if ($k === 'status') {
                $v = $status_translation[$v];
            }
            $row[] = $v;
        }
        $body[] = $row;
    }
    $html_headers = get_row($headers, "th");
    $table .= $html_headers;
    foreach ($body as $row) {
        $table .= get_row($row, "td");
    }
    $table .= '</table>';

    return $table;
}
