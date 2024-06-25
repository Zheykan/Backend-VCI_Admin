<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/city.php");

    $control = $_GET['control'] ;

    $ciudad = new City($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $ciudad->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"Puerto Lopéz", "FO_departamento":"14"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $ciudad->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=14
            $id = $_GET['id'] ;
            $veconsulta = $ciudad->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Aguazul", "FO_departamento":"14"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=14
            $id = $_GET['id'] ;
            $veconsulta = $ciudad->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Puerto+Lopéz - Apartadó
            $veconsulta = $ciudad->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>