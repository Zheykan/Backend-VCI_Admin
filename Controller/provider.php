<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested_With, Content-Type, Accept");

    require_once("../conection.php");
    require_once("../model/provider.php");

    $control = $_GET['control'] ;

    $proveedor = new Provider($conexion) ;

    switch ($control) {
        case 'consulta':
            $veconsulta = $proveedor->consulta() ;
        break ;
        case 'insertar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"id_proveedor_nit":"910228545","razon_social":"Lacteos Fascenda",
            //"contacto":"Allison Rojas","telefono":"776-55873","correo":"distribuciones@fascenda.com",
            //"direccion":"Direccion #","FO_ciudad":"5"}' ;
            $params = json_decode($json) ;
            //Respuesta de parametros por consola
            //print_r($params) ;
            $veconsulta = $proveedor->insertar($params) ;
        break ;
        case 'eliminar':
            //parametro de prueba: &id=910228545
            $id = $_GET['id'] ;
            $veconsulta = $proveedor->eliminar($id) ;
        break ;
        case 'editar':
            //siempre activa, desactivar al realizar una prueba
            $json = file_get_contents('php://input') ;
            //parametros prueba json
            //$json= '{"id_proveedor_nit":"910228545","razon_social":"Lacteos Fascenda",
            //"contacto":"Carlos Porras","telefono":"786-23873","correo":"distribuciones@fascenda.com",
            //"direccion":"Direccion #4","FO_ciudad":"13"}' ;
            $params = json_decode($json) ;
            //parametro de prueba: &id=910228545
            $id = $_GET['id'] ;
            $veconsulta = $proveedor->editar($id, $params) ;
        break ;
        case 'filtrar':
            $valor = $_GET['valor'] ;
            //parametro de prueba: &valor=Lacteos+Fascenda - &valor=Ventas
            $veconsulta = $proveedor->filtrar($valor) ;
        break ;

    }

    $datosjs = json_encode($veconsulta) ;
    header('Content-Type: application/json') ;
    echo $datosjs ;
?>