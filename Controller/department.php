<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/department.php");

    $control = $_GET['control'] ;

    $departamento = new Department($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $departamento->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Meta"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $departamento->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=14
            $id = $_GET['id'] ;
            $veconsulta = $departamento->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Casanare"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=14
            $id = $_GET['id'] ;
            $veconsulta = $departamento->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Meta - Antioquia
            $veconsulta = $departamento->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>