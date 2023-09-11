<?php

include("conexion.php");
class Usuario {
    private $conexion;
    

    public function __construct() {
        $this->conexion = new Conexion();;
    }

    public function validarInicioSesion($usuario, $contrasena) {
        // Escapar y sanitizar las entradas del usuario para evitar inyección SQL
        $usuario = addslashes($usuario);
        $contrasena = addslashes($contrasena);

        // Realizar la consulta SQL
        $sql = "SELECT * FROM usuarios_pass WHERE usuario = '$usuario' AND password = '$contrasena'";

        $result =  $this->conexion->conn->query($sql);
        //var_dump($result->num_rows);

        if ($result->num_rows == 1) {
            // Las credenciales son válidas, el usuario ha iniciado sesión con éxito
            return true;
        } else {
            // Las credenciales no son válidas, el inicio de sesión falló
            return false;
        }
    }

    public function registrarUsuario($nuevoUsuario, $nuevaContrasena) {
        // Escapar y sanitizar las entradas del usuario para evitar inyección SQL
        $nuevoUsuario = addslashes($nuevoUsuario);
        $nuevaContrasena = addslashes($nuevaContrasena);

        // Realizar una consulta para verificar si el usuario ya existe
        $sql = "SELECT * FROM usuarios_pass WHERE usuario = '$nuevoUsuario'";
        $result = $this->conexion->getConnection()->query($sql);

        if ($result->num_rows == 0) {
            // El usuario no existe en la base de datos, procedemos con el registro
            $sql = "INSERT INTO usuarios_pass (usuario, password) VALUES ('$nuevoUsuario', '$nuevaContrasena')";

            if ($this->conexion->query($sql) === true) {
                // El registro se completó con éxito
                return true;
            } else {
                // Error en la inserción
                return false;
            }
        } else {
            // El usuario ya existe en la base de datos, no se puede registrar
            return false;
        }
    }
}

?>