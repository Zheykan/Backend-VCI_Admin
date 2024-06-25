<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/user.php");

    $control = $_GET['control'] ;

    $usuario = new User($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $usuario->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Nestor Caro","contrasenia":"456234","telefono":"3204892234",
            //"correo":"caro_nestor_1987@gmail.com","rol":"2","caja":""}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $usuario->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=3
            $id = $_GET['id'] ;
            $veconsulta = $usuario->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Nestor Caro","contrasenia":"456234","telefono":"3204892234",
            //"correo":"caro_nestor_1987@gmail.com","rol":"4","caja":""}' ;
            //$params = json_decode($json) ;
            //parametro de prueba: &id=3
            $id = $_GET['id'] ;
            $veconsulta = $usuario->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Nestor+Caro - Eduardo+Castro
            $veconsulta = $usuario->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>