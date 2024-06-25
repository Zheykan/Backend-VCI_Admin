<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/devolution.php");

    $control = $_GET['control'] ;

    $devolucion = new Devolution($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $devolucion->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Nestor Caro","contrasenia":"456234","telefono":"3204892234",
            //"correo":"caro_nestor_1987@gmail.com","rol":"Gestor de Bodega","caja":""}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $devolucion->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=3
            $id = $_GET['id'] ;
            $veconsulta = $devolucion->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Nestor Caro","contrasenia":"456234","telefono":"3204892234",
            //"correo":"caro_nestor_1987@gmail.com","rol":"Soporte Tecnico","caja":""}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=3
            $id = $_GET['id'] ;
            $veconsulta = $devolucion->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Nestor+Caro - Eduardo+Castro
            $veconsulta = $devolucion->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>