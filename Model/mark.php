<?php

    class Mark {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT * FROM marca ORDER BY nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO marca(nombre)
            VALUES('$params->nombre')";
            mysqli_query( $this->conexion, $ins) or die('la marca no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La marca ha sido almacenada";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM marca WHERE id_marca = $id";
            mysqli_query($this->conexion, $del) or die('la marca no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La marca ha sido eliminada";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE marca SET nombre = '$params->nombre' WHERE id_marca = $id";
            mysqli_query($this->conexion, $editar) or die('la marca no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La marca ha sido actualizada";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT * FROM marca WHERE nombre LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('la marca no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>