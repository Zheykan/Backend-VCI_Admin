<?php

    class Error_city {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT * FROM error_ciudad ORDER BY id_error";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO error_ciudad(FO_error, FO_ciudad) VALUES('$params->FO_error', '$params->FO_ciudad')";
            mysqli_query( $this->conexion, $ins) or die('el tipo de error no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El tipo de error ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM error_ciudad WHERE id_error = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El error ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE error_ciudad SET FO_error = '$params->FO_error', FO_ciudad = '$params->FO_ciudad' 
                       WHERE id_error = $id";
            mysqli_query($this->conexion, $editar) or die('el error no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El error ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT * FROM error_ciudad WHERE id_error LIKE '%$valor%' OR FO_error LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('el error no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>