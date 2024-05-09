<?php

    class City {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT c.*, d.nombre AS departamento FROM ciudad c 
                    INNER JOIN departamento d ON c.FO_departamento = d.id_departamento 
                    ORDER BY c.nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO ciudad(nombre, FO_departamento) 
                    VALUES('$params->nombre', '$params->FO_departamento')";
            mysqli_query( $this->conexion, $ins) or die('la ciudad no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La ciudad ha sido almacenada";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM ciudad WHERE id_ciudad = $id";
            mysqli_query($this->conexion, $del) or die('la ciudad no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La ciudad ha sido eliminada";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE ciudad SET nombre = '$params->nombre', FO_departamento = '$params->FO_departamento'
                       WHERE id_ciudad = $id";
            mysqli_query($this->conexion, $editar) or die('la ciudad no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La ciudad ha sido actualizada";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT c.*, d.nombre AS departamento FROM ciudad c 
                       INNER JOIN departamento d ON c.FO_departamento = d.id_departamento 
                       WHERE c.FO_departamento LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('la categoria no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>