<?php

class Conexion {
    private $servername = "localhost";  // Cambia esto al servidor de tu base de datos
    private $username = "root";
    private $password = "";
    private $database = "pruebas";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>