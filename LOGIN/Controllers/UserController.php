<?php 
//session_start();
require_once(__DIR__ . '/../Configs/params.php');
include("./Models/UserModel.php");

class UserController {
    
    public function login() {

        if(isset($_POST['usuario']) && $_POST['usuario'] !=''){
            $usuario = new Usuario();
            $existe = $usuario->findUser($_POST['usuario'], $_POST['contrasena']);
        
            if($existe){
                $_SESSION['login'] = 1;
                header('location:./index.php');
            }else{
                echo "Usuario o contraseña errónea.";
            }
        
        }else{
            unset($_SESSION['login']);
        }

        // Aquí puedes agregar la lógica para mostrar el formulario de inicio de sesión.
        // Por ejemplo, podrías incluir la vista de inicio de sesión.
        include('Views/login.php');
    }

    public function registrar(){
        include('./Views/formularioRegistro.php');
    }

    public function guardarUsuario() {
        // Aquí puedes agregar la lógica para mostrar el formulario de registro.
        // Por ejemplo, podrías incluir la vista de registro.

        echo "<pre>";
        var_dump($_POST);
        if (isset($_POST['usuario']) && $_POST['usuario'] != '') {
            // Procesar el registro de un nuevo usuario
            $usuario = new Usuario();
            $nuevoUsuario = $_POST['usuario'];
            $nuevoNombre = $_POST['nombre'];
            $nuevoApellido = $_POST['apellido'];
            $nuevaPassword = $_POST['password'];
            $nuevoEmail = $_POST['email'];

        

        /*  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar']) && $_POST['registrar'] == 1) {
            // Procesar el registro de un nuevo usuario
            $usuario = new Usuario();
            $nuevoUsuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
            $nuevoNombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $nuevoApellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
            $nuevaPassword = isset($_POST['password']) ? $_POST['password'] : '';
            $nuevoEmail = isset($_POST['email']) ? $_POST['email'] : ''; */
        
            $registro = $usuario->insertUser($nuevoUsuario, $nuevoNombre, $nuevoApellido, $nuevaPassword, $nuevoEmail);
        
            if ($registro) {
                // Redirigir al usuario a la página de inicio después del registro
                header("Location: index.php");
            } else {
                // Mostrar un mensaje de error al usuario
                echo "Error al registrar el usuario. Por favor, intente nuevamente.";
            }
        }
        include('views/formularioRegistro.php');
    }

    public function principal() {
        // Aquí puedes agregar la lógica para mostrar la página principal.
        // Por ejemplo, podrías incluir la vista de la página principal.
        include('views/principal.php');
    }
}


?>