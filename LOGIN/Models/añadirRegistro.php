<?php
require_once("conexion.php"); // Reemplaza con la ubicación real de tu archivo Database.php

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
?>