<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/purchase.php");

    $control = $_GET['control'] ;

    $compra = new Purchase($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $compra->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            //$json = file_get_contents('php://input') ;
            //parametros prueba json
            $json= '{"FO_proveedor":"92394297","subtotal":"84000000",
            "impuestos":"16000000","total":"100000000"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $compra->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=1239
            $id = $_GET['id'] ;
            $veconsulta = $compra->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            //$json = file_get_contents('php://input') ;
            //parametros prueba json
            $json= '{"FO_proveedor":"92394297","subtotal":"8400000",
            "impuestos":"1600000","total":"10000000"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=1239
            $id = $_GET['id'] ;
            $veconsulta = $compra->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: &valor=Probac - &valor=1238 - &valor=91737891
            $veconsulta = $compra->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    echo $datosjs ;
    header('Content-Type: application/json') ;
?>