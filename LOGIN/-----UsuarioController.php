<?php
require_once('usuario.php');

$usuario = new Usuario();

if (isset($_POST['iniciarSesion'])) {
    $nombreUsuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Validar el inicio de sesión
    $validacion = $modelo->validarInicioSesion($nombreUsuario, $contrasena);

    if ($validacion) {
        // Redirigir al usuario a la página de inicio después de iniciar sesión
        header("Location: index.php");
    } else {
        // Mostrar un mensaje de error al usuario
        echo "Inicio de sesión fallido. Por favor, intente nuevamente.";
    }
}

if (isset($_POST['registrar'])) {
    // Procesar el registro de un nuevo usuario
    $nuevoUsuario = $_POST['usuario'];
    $nuevaContrasena = $_POST['contrasena'];

    $registro = $usuario->registrarUsuario($nuevoUsuario, $nuevaContrasena);

    if ($registro) {
        // Redirigir al usuario a la página de inicio después del registro
        header("Location: index.php");
    } else {
        // Mostrar un mensaje de error al usuario
        echo "Error al registrar el usuario. Por favor, intente nuevamente.";
    }
}
?>