<?php

require_once(__DIR__."/../lib/Database.php");

class User {
    private $table = "users";

    public function __construct() {}
    
    public function register($user_name, $email, $password) {
        $client = Database::getInstance();
        $sql = "INSERT INTO `{$this->table}` (name, email, password)
            VALUES ('{$user_name}', '{$email}', '{$password}')";
        $result = $client->query($sql);
        return boolval($result);
    }
}
