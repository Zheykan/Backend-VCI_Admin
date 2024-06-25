<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/client.php");

    $control = $_GET['control'] ;

    $cliente = new Client($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $cliente->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"id_cliente":"1053611645","nombre_apellido":"Omar Guarin",
            //"telefono":"3215006745","correo":"guarinomar@outlook.com","domicilio":"Cra 67 # 102 - 54"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $cliente->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=1053605645
            $id = $_GET['id'] ;
            $veconsulta = $cliente->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"id_cliente":"1053605645","nombre_apellido":"Omar Guarin",
            //"telefono":"3215006745","correo":"guarinomar@outlook.com","domicilio":"Cra 67 # 102 - 54"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=1053611645
            $id = $_GET['id'] ;
            $veconsulta = $cliente->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Omar+Guarin - 91886754
            $veconsulta = $cliente->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>