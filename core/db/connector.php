<?php

class Cursor
{
    protected \PDO $pdo;
    
    function __construct ($db_config) {
        $this->pdo = new \PDO("mysql:host=localhost;dbname=bookingbook", $db_config["user"], $db_config["pass"]);
    }

    function cursor (string $q)
    {        
        $query = $this->pdo->prepare($q);
        return $query;
    }
}

function cursor ()
{
    require_once 'config.php';
    $db = new Cursor($app_config["database"]);
    return $db; 
}
