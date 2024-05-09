<?php

    class Department {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT * FROM departamento ORDER BY nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO departamento(nombre) VALUES('$params->nombre')";
            mysqli_query( $this->conexion, $ins) or die('el departamento no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El departamento ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM departamento WHERE id_departamento = $id";
            mysqli_query($this->conexion, $del) or die('el departamento no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El departamento ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE departamento SET nombre = '$params->nombre' WHERE id_departamento = $id";
            mysqli_query($this->conexion, $editar) or die('el departamento no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El departamento ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT * FROM departamento WHERE nombre LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('el departamento no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>