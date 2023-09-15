<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'pruebas';
    private $username = 'root';
    private $password = '';
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->db;
    }
}
?>
