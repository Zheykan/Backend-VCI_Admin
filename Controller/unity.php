<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/unity.php");

    $control = $_GET['control'] ;

    $unidad_med = new Unity($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $unidad_med->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"m"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $unidad_med->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: 13
            $id = $_GET['id'] ;
            $veconsulta = $unidad_med->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"gal"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=13
            $id = $_GET['id'] ;
            $veconsulta = $unidad_med->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: gal - lt
            $veconsulta = $unidad_med->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>