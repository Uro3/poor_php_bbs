<?php

class Database {
    private static $instance;
    private $client;

    private $host = "db";
    private $user = "dev-user";
    private $password = "password";
    private $dbName = "bbs";

    private function __construct() {
        $this->client = new mysqli($this->host, $this->user, $this->password, $this->dbName);
    }
    
    final public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query($sql) {
        return $this->client->query($sql);
    }

    public function getLastInsertedId() {
        return $this->client->insert_id;
    }
}
