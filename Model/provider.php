<?php

    class Provider {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT p.*, c.nombre AS ciudad FROM proveedor p 
                    INNER JOIN ciudad c ON p.FO_ciudad = c.id_ciudad 
                    ORDER BY p.razon_social";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO proveedor(id_proveedor_nit, razon_social, contacto, telefono, 
                    correo, direccion, FO_ciudad) 
                    VALUES('$params->id_proveedor_nit', '$params->razon_social', '$params->contacto',
                    '$params->telefono', '$params->correo', '$params->direccion', '$params->FO_ciudad')";
            mysqli_query( $this->conexion, $ins) or die('el proveedor no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El proveedor ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM proveedor WHERE id_proveedor_nit = $id";
            mysqli_query($this->conexion, $del) or die('el proveedor no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El proveedor ha sido eliminada";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE proveedor SET id_proveedor_nit = '$params->id_proveedor_nit', 
                       razon_social = '$params->razon_social', contacto = '$params->contacto', 
                       telefono = '$params->telefono', correo = '$params->correo', 
                       direccion = '$params->direccion', FO_ciudad = '$params->FO_ciudad'
                       WHERE id_proveedor_nit = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El proveedor ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT p.*, c.nombre AS ciudad FROM proveedor p 
                       INNER JOIN ciudad c ON p.FO_ciudad = c.id_ciudad 
                       WHERE p.razon_social LIKE '%$valor%' OR p.contacto LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('el proveedor no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>