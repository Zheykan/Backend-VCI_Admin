<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/login.php");

    $email = $_GET['email'] ;
    $passwrd = $_GET['passwrd'] ;

    $sesion = new Login($conexion) ;

    $vec = $sesion->consulta($email,$passwrd) ;

    $datosjs = json_encode($vec) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>