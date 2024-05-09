<?php

    class Errorh{
        //atributo
        public $conexion;

    //metodo constructor de conexion
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con = "SELECT * FROM errorh ORDER BY id_errorh";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO errorh(id_errorh, nombre, descripcion)
                    VALUES ('$params->id_errorh', '$params->nombre', 
                    '$params->descripcion')";
            mysqli_query($this->conexion, $ins) or die('el error no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "El error ha sido almacenado";
            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM errorh WHERE id_errorh = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El error ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE errorh SET nombre = '$params->nombre', descripcion = '$params->descripcion' 
                    WHERE id_errorh = $id";
            mysqli_query($this->conexion, $editar) or die('el error no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El error ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor)
        {
            $filtro = "SELECT * FROM errorh WHERE id_errorh LIKE '%$valor%' OR nombre LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $filtro) or die('el error no se ha podido encontrar');
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>