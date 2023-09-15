<?php
session_start();

include 'Controllers/UserController.php';


$userController = new UserController();

//if(isset($_SESSION['login']) && $_GET['login'] == 0){
if(isset($_SESSION['login']) && isset($_GET['login']) && $_GET['login'] == 0){

    session_destroy();
}

if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
    $userController->principal();
}elseif (isset($_POST['registrar']) && $_POST['registrar']== 1){
    $userController->guardarUsuario();
}else{
    $userController->login();
}
?>
