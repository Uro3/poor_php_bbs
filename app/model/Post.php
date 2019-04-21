<?php

require_once(__DIR__."/../lib/Database.php");
require_once(__DIR__."/User.php");

class Post {
    private const TABLE_NAME = "posts";
    private $client;
    private $table;

    public function __construct() {
        $this->client = Database::getInstance();
        $this->table = self::getTableName();
    }

    public static function getTableName() {
        return self::TABLE_NAME;
    }
    
    public function insert($userId, $text) {
        $sql = "INSERT INTO `{$this->table}` (`user_id`, `text`)
            VALUES ('{$userId}', '{$text}')";
        $result = $this->client->query($sql);
        return $result;
    }

    public function fetch() {
        $userTable = User::getTableName();
        $sql = "SELECT p.id, p.user_id, u.name, p.text, p.created_at FROM `{$this->table}` AS p
            INNER JOIN `{$userTable}` AS u
            ON p.user_id = u.id";
        $result = $this->client->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function delete($id, $userId) {
        $sql = "DELETE FROM `{$this->table}`
            WHERE `id` = '{$id}'
            AND `user_id` = '{$userId}'";
        $result = $this->client->query($sql);
        return $result;
    }
}
