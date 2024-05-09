<?php

    class Bond_p_c {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT pc.*, p.nombre AS producto FROM vinculo_p_c pc
                    INNER JOIN producto p ON pc.id_producto = p.id_producto
                    INNER JOIN compra c ON pc.id_compra = c.id_compra 
                    ORDER BY pc.id_compra";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO vinculo_p_c(id_compra, id_producto, fecha_adq, cantidad_adq, precio_compra) 
                    VALUES('$params->id_compra', '$params->id_producto', '$params->cantidad_fecha_adq', 
                    '$params->cantidad_adq', '$params->precio_compra')";
            mysqli_query( $this->conexion, $ins) or die('el vinculo no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El vinculo ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM vinculo_p_c WHERE id_vinculo = $id";
            mysqli_query($this->conexion, $del) or die('el vinculo no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El vinculo ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE vinculo_p_c SET id_compra = '$params->id_compra', id_producto = '$params->id_producto', 
                       fecha_adq = '$params->fecha_adq', cantidad_adq = '$params->cantidad_adq', 
                       precio_compra = '$params->precio_compra' WHERE id_vinculo = $id";
            mysqli_query($this->conexion, $editar) or die('el vinculo no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El vinculo ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT pc.*, c.id_compra AS compra, p.nombre AS producto FROM vinculo_p_c pc
                       INNER JOIN producto p ON pc.id_producto = p.id_producto
                       INNER JOIN compra c ON pc.id_compra = c.id_compra 
                       WHERE pc.id_vinculo LIKE '%$valor%' OR pc.id_compra LIKE '%$valor%' 
                       OR pc.id_producto LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('El vinculo no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>