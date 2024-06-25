<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/role.php");

    $control = $_GET['control'] ;

    $rol = new Role($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $rol->consulta() ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Administrador - Vendedor
            $veconsulta = $rol->filtrar($valor) ;
        break ;
    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>