<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/bond_v_p.php");

    $control = $_GET['control'] ;

    $bondvp = new Bond_v_p($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $bondvp->consulta() ;
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
            $veconsulta = $bondvp->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: 3
            $id = $_GET['id'] ;
            $veconsulta = $bondvp->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"nombre":"Nestor Caro","contrasenia":"456234","telefono":"3204892234",
            //"correo":"caro_nestor_1987@gmail.com","rol":"Soporte Tecnico","caja":""}' ;
            $params = json_decode($json) ;
            //parametro de prueba: 3
            $id = $_GET['id'] ;
            $veconsulta = $bondvp->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: Nestor+Caro - Eduardo+Castro
            $veconsulta = $bondvp->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    echo $datosjs ;
    header('Content-Type: application/json') ;
?>