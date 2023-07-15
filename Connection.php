<?php
namespace conn;

use PDO;
use PDOException;

Class Connection {

    private $server = "mysql:host=localhost;dbname=teatri_db";
    private $user = "root";
    private $password = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $conn;

    public function open() {
        try {
            $this->conn = new PDO($this->server, $this->user, $this->password, $this->options);
            return $this->conn;   
        } catch (PDOException $e) {
            echo "An error occurred during connection: " . $e->getMessage();
            die();
        }
    }

    public function close()
    {
        $this->conn = null;
    }
}