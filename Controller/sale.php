<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/sale.php");

    $control = $_GET['control'] ;

    $venta = new Sale($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $venta->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"fecha":"2024-05-23","FO_usuario_vendedor":"2","FO_cliente":"91886754",
            //"productos_venta":"1,2,3","cantidad_venta":"1,1,1","subtotal":"329280",
            //"impuestos":"62720","total":"392000"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $venta->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=301
            $id = $_GET['id'] ;
            $veconsulta = $venta->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"fecha":"2024-05-22","FO_usuario_vendedor":"2","FO_cliente":"91886754",
            //"productos_venta":"1,2,3","cantidad_venta":"1,1,1","subtotal":"329280",
            //"impuestos":"62720","total":"392000"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=301
            $id = $_GET['id'] ;
            $veconsulta = $venta->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: &valor=301 - &valor=2024-06-04 - &valor=Cesar+Avellaneda - &valor=91886754
            $veconsulta = $venta->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>