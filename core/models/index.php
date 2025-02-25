<?php

require "./core/db/connector.php";

class Model
{
    protected string $name;
    protected mixed $cr;
    protected string $entity_class = "Entity";
    public array $related = [];

    function __construct(string $name)
    {
        $this->name = $name;
        $this->cr = cursor();
    }

    public function fetch_all(): array
    {
        $query = "SELECT * FROM $this->name";
        $cr = $this->cr->cursor($query);
        $cr->execute();
        $result = $cr->fetchAll(PDO::FETCH_CLASS, $this->entity_class, [$this]);
        return $result;
    }

    protected function sanitize_values(array &$item): array 
    {
        return $item = [];
    }

    public function create(array $item): bool
    {
        $this::sanitize_values($item);
        $query = "INSERT INTO $this->name (";
        $columns = [];
        $values = [];
        foreach ($item as $k => $v) {
            $columns[] = $k;
            $values[] = ":$k";
        }
        $query .= implode(", ", $columns);
        $query .= ') VALUES (';
        $query .= implode(", ", $values);
        $query .= ')';
        $cr = $this->cr->cursor($query);
        $cr->execute($item);
        return true;
    }

    public function filter(callable $callback): array
    {
        $resultset = $this->fetch_all();
        $result = [];
        foreach ($resultset as $id => $record) {
            if ($callback($id, $record->to_array())) {
                $result[$id] = $record;
            }
        }
        return $result;
    }

    public function get(array $item): ?Entity
    {
        $query = "SELECT * FROM $this->name WHERE ";
        $where = [];
        foreach ($item as $k => $v) {
            $where[] = "$k=:$k";
        }
        $query .= implode(" AND ", $where);
        $cr = $this->cr->cursor($query);
        $cr->execute($item);
        $resultset = $cr->fetchAll(PDO::FETCH_CLASS, $this->entity_class, [$this]);
        if (!empty($resultset)) {
            return $resultset[array_key_first($resultset)];
        } else {
            return null;
        }
    }
}

class Entity
{
    protected Model $model;

    function __construct(Model $model)
    {
        $this->model = $model;
        if (isset($model->related) && !empty($model->related)) {
            foreach ($model->related as $key => $options) {
                $related_class = null;
                $class = $options[1];
                if(class_exists($class)) $related_class = new $class(strtolower($class));
                if ($related_class !== null) {
                    $this->{$key} = $related_class->get([$options[0] => $this->{$key}])->to_array();
                }
            }
        }
    }

    public function to_array(): array
    {
        $arr = (array)$this;
        // ->model is protected on orginal instance
        unset($arr["\0*\0model"]);
        return $arr;
    }
}
