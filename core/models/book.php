<?php

use PDO;

require './core/models/index.php';

class BookEntity extends Entity
{
    public string $name;
    public string $description;
    public string $date;
    public string $status;
}

class Books extends Model
{
    protected string $entity_class = "BookEntity";

    function __construct()
    {
        parent::__construct("books");
    }

    function sanitize_values(array &$item): array
    {
        $result = [];
        foreach ($item as $k => $v) {
            if (!property_exists($this->entity_class, $k)) {
                continue;
            }
            switch ($k) {
                case "name":
                case "description":
                case "status":
                    $result[$k] = htmlspecialchars($v);
                    break;
                case "date":
                    $result[$k] = date("Y-m-d H:i:s", (int)strtotime($v));
                    break;
            }
        }
        return $item = $result;
    }
}
