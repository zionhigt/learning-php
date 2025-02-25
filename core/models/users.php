<?php

require './core/models/index.php';

class UserEntity extends Entity
{
    public string $name;
    public string $password;
}

class Roles extends Model
{
    protected string $entity_class = "RoleEntity";
}

class RoleEntity extends Entity
{
    public int $id;
    public string $name;
}

class Users extends Model
{
    protected string $entity_class = "UserEntity";
    public array $related = [
        "role_id" => ["id", "Roles"],
    ];

    function __construct()
    {
        parent::__construct("users");
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
                case "password":
                    $result[$k] = htmlspecialchars($v);
                    break;
            }
        }
        return $item = $result;
    }
}
