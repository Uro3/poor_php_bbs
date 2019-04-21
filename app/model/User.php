<?php

require_once(__DIR__."/../lib/Database.php");

class User {
    private const TABLE_NAME = "users";
    private $client;
    private $table;

    public function __construct() {
        $this->client = Database::getInstance();
        $this->table = self::getTableName();
    }

    public static function getTableName() {
        return self::TABLE_NAME;
    }
    
    public function register($user_name, $email, $password) {
        $sql = "INSERT INTO `{$this->table}` (name, email, password)
            VALUES ('{$user_name}', '{$email}', '{$password}')";
        $result = $this->client->query($sql);
        return $this->client->getLastInsertedId();;
    }

    public function verify($email, $password) {
        $sql = "SELECT `id` FROM `{$this->table}`
            WHERE `email` = '{$email}'
            AND `password` = '{$password}'";
        $result = $this->client->query($sql);
        $row = $result->fetch_assoc();
        return $row["id"];
    }
}
