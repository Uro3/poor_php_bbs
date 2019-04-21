<?php

require_once(__DIR__."/../lib/Database.php");

class User {
    private $client;
    private $table = "users";

    public function __construct() {
        $this->client = Database::getInstance();
    }
    
    public function register($user_name, $email, $password) {
        $sql = "INSERT INTO `{$this->table}` (name, email, password)
            VALUES ('{$user_name}', '{$email}', '{$password}')";
        $result = $this->client->query($sql);
        return $this->client->getLastInsertedId();;
    }

    public function getUserId($email) {
        $sql = "SELECT `id` FROM `{$this->table}`
            WHERE `email` = '{$email}'";
        $result = $this->client->query($sql);
        return $result;
    }
}
