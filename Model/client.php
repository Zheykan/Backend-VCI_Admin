<?php

    class Client {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT * FROM cliente ORDER BY nombre_apellido";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO cliente(id_cliente, nombre_apellido, telefono, correo, domicilio)
                    VALUES('$params->id_cliente', '$params->nombre_apellido', '$params->telefono', 
                    '$params->correo', '$params->domicilio')";
            mysqli_query( $this->conexion, $ins) or die('el cliente no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "el cliente ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM cliente WHERE id_cliente = $id";
            mysqli_query($this->conexion, $del) or die('el cliente no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "el cliente ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE cliente SET id_cliente = '$params->id_cliente', nombre_apellido = '$params->nombre_apellido', 
                       telefono = '$params->telefono', correo = '$params->correo', domicilio = '$params->domicilio' 
                       WHERE id_cliente = $id";
            mysqli_query($this->conexion, $editar) or die('el cliente no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "el cliente ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT * FROM cliente WHERE id_cliente LIKE '%$valor%' OR nombre_apellido LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('el cliente no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>