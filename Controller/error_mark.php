<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/error_mark.php");

    $control = $_GET['control'] ;

    $errorm = new Error_mark($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $errorm->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"id_error":422, "nombre":"Error de base de datos","descripcion":"La base de datos 
            //esta corrupta"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $errorm->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: 422
            $id = $_GET['id'] ;
            $veconsulta = $errorm->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Error de servidor","descripcion":"No se puede establecer conexión 
            //con el servidor"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: 422
            $id = $_GET['id'] ;
            $veconsulta = $errorm->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: 422 - Error+de+base+de+datos
            $veconsulta = $errorm->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    echo $datosjs ;
    header('Content-Type: application/json') ;
?>