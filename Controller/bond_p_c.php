<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/bond_p_c.php");

    $control = $_GET['control'] ;

    $bondpc = new Bond_p_c($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $bondpc->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"id_vinculo":"38","id_compra":"1237","id_producto":"7","fecha_adq":"2022-07-15",
            //"cantidad_adq":"10","precio_compra":"243600"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $bondpc->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: 38
            $id = $_GET['id'] ;
            $veconsulta = $bondpc->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"id_compra":"1237","id_producto":"7","fecha_adq":"2023-09-04",
            //"cantidad_adq":"10","precio_compra":"243600"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: 38
            $id = $_GET['id'] ;
            $veconsulta = $bondpc->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: 38 - 1237
            $veconsulta = $bondpc->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    echo $datosjs ;
    header('Content-Type: application/json') ;
?>