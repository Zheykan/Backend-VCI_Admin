<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/errorh.php");

    $control = $_GET['control'] ;

    $errorhs = new Errorh($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $errorhs->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            //$json = file_get_contents('php://input') ;
            //parametros prueba json
            $json = '{"id_errorh":"423","nombre":"Error FATAL de base de datos",
                "descripcion":"La base de datos se encuentra corrupta."}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $errorhs->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=423
            $id = $_GET['id'] ;
            $veconsulta = $errorhs->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            //$json = file_get_contents('php://input') ;
            //parametros prueba json
            $json = '{"id_errorh":"423","nombre":"Error de configuración",
            "descripcion":"La ruta no es valida para alojar la carpeta home."}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=423
            $id = $_GET['id'] ;
            $veconsulta = $errorhs->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: &valor=422 - &valor=Error+de+configuración
            $veconsulta = $errorhs->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    echo $datosjs ;
    header('Content-Type: application/json') ;
?>