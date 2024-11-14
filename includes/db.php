<?php
class Database {
    private $host = "localhost";
    private $db_name = "project_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        if ($this->conn == null) {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }
}
?>
