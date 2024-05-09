<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/product.php");

    $control = $_GET['control'] ;

    $producto = new Product($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $producto->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            //$json = file_get_contents('php://input') ;
            //parametros prueba json
            $json= '{"nombre":"Yogurt Durazno","FO_marca":"1",
            "cantidad_producto":"20","medida":"1","FO_unidad":"2",
            "precio_venta":"13800","fecha_venc":"2025-03-24"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $producto->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=11
            $id = $_GET['id'] ;
            $veconsulta = $producto->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            //$json = file_get_contents('php://input') ;
            //parametros prueba json
            $json= '{"nombre":"Yogurt Durazno","FO_marca":"1",
            "cantidad_producto":"15","medida":"1000","FO_unidad":"3",
            "precio_venta":"13800","fecha_venc":"2024-12-16"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=11
            $id = $_GET['id'] ;
            $veconsulta = $producto->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Yogurt+Durazno - 10 - Nestle
            $veconsulta = $producto->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    echo $datosjs ;
    header('Content-Type: application/json') ;
?>