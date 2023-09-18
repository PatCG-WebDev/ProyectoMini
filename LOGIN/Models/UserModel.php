<?php

require_once(__DIR__ . '/../Configs/params.php');
include("./Classes/DataBase.php");

class Usuario {
    private $conexion;
    

    public function __construct() {
        $this->conexion = new Database();
    }

    public function findUser($usuario, $contrasena) {

        // Escapar y sanitizar las entradas del usuario para evitar inyección SQL
        $usuario = addslashes($usuario);
        $contrasena = addslashes($contrasena);

        // Realizar la consulta SQL
        $sql = 'SELECT * FROM usuarios_pass WHERE usuario = "'.$usuario.'" AND password = "'.$contrasena.'"';
        $result = $this->conexion->getConnection()->query($sql);
        if($result->fetch()){
            // Las credenciales son válidas, el usuario ha iniciado sesión con éxito
            return true;
        }else{
            // Las credenciales no son válidas, el inicio de sesión falló
            return false;
        }

    }


    public function insertUser($nuevoUsuario, $nuevoNombre, $nuevoApellido, $nuevaPassword, $nuevoEmail) {
        // Escapar y sanitizar las entradas del usuario para evitar inyección SQL
        $nuevoUsuario = addslashes($nuevoUsuario);
        $nuevoNombre = addslashes($nuevoNombre);
        $nuevoApellido = addslashes($nuevoApellido);
        $nuevaPassword = addslashes($nuevaPassword);
        $nuevoEmail = addslashes($nuevoEmail);


        // Realizar una consulta para verificar si el usuario ya existe
        $sql = "SELECT * FROM usuarios_pass WHERE usuario = '$nuevoUsuario'";
        $result = $this->conexion->getConnection()->query($sql);

        if ($result->fetch()){

            return false;

        }else{

            $sql = "INSERT INTO usuarios_pass (usuario, nombre, apellido, password, email) VALUES ('$nuevoUsuario', '$nuevoNombre', '$nuevoApellido', '$nuevaPassword', '$nuevoEmail')";
            $this->conexion->getConnection()->exec($sql);
            return true;
            
        }
            

      /*       if ($this->conexion->query($sql) === true) {
                // El registro se completó con éxito
                return true;
            } else {
                // Error en la inserción
                return false;
            }
        } else {
            // El usuario ya existe en la base de datos, no se puede registrar
            return false; */
        
    }

/*     public function anhadirRegistro() {

        //aqui va la logica de añadirResistro

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si se ha enviado el formulario
        
            // Recoger datos del formulario
            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $contrasena = $_POST["contrasena"];
            $email = $_POST["email"];
        
            // Validación básica de datos (puedes agregar validaciones más robustas)
            if (empty($usuario) || empty($nombre) || empty($apellido) || empty($contrasena) || empty($email)) {
                echo "Por favor, complete todos los campos del formulario.";
            } else {
                // Escapar y sanitizar los datos (para evitar la inyección SQL)
                $usuario = htmlspecialchars($usuario);
                $nombre = htmlspecialchars($nombre);
                $apellido = htmlspecialchars($apellido);
                $contrasena = htmlspecialchars($contrasena);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        
                if ($email === false) {
                    echo "Por favor, introduzca una dirección de correo electrónico válida.";
                } else {
        
        
                    $conexion = new Conexion();
                    $conn = $conexion->getConnection();
        
                    $sql = "INSERT INTO usuarios_pass (usuario, nombre, apellido, password, email) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $usuario, $nombre, $apellido, $contrasena, $email);
        
                    if ($stmt->execute()) {
                        echo "Registro exitoso. ¡Bienvenido!";
                    } else {
                        echo "Error al registrar el usuario. Por favor, inténtelo de nuevo.";
                    }
        
                    $stmt->close();
                    $conn->close();
                }
            }
        } else {
            // Si el formulario no se ha enviado, redirigir al formulario de registro
            header("Location: formularioRegistro.php");
            exit();
        }
    } */
}

?>