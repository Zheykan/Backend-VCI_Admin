<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/mark.php");

    $control = $_GET['control'] ;

    $marca = new Mark($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $marca->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Nike"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $marca->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=11
            $id = $_GET['id'] ;
            $veconsulta = $marca->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Reebok"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=11
            $id = $_GET['id'] ;
            $veconsulta = $marca->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Reebok - Alpina
            $veconsulta = $marca->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    echo $datosjs ;
    header('Content-Type: application/json') ;
?>