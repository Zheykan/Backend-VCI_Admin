<?php

    class Bond_v_p {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT vp.*, p.nombre AS producto, v.fecha AS fecha FROM vinculo_v_p vp
                    INNER JOIN producto p ON vp.FO_producto = p.id_producto
                    INNER JOIN venta v ON vp.FO_venta = v.id_venta 
                    ORDER BY vp.id_vinculo";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO vinculo_v_p(FO_venta, FO_producto, cantidad_venta) 
                    VALUES('$params->FO_venta', '$params->FO_producto', '$params->cantidad_venta')";
            mysqli_query( $this->conexion, $ins) or die('el vinculo no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El vinculo ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM vinculo_v_p WHERE id_vinculo = $id";
            mysqli_query($this->conexion, $del) or die('el vinculo no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El vinculo ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE vinculo_v_p SET FO_venta = '$params->FO_venta', FO_producto = '$params->FO_producto', 
                       cantidad_venta = '$params->cantidad_venta' WHERE id_producto = $id";
            mysqli_query($this->conexion, $editar) or die('el vinculo no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El vinculo ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT vp.*, v.id_venta AS venta, p.nombre AS producto FROM vinculo_v_p vp
                       INNER JOIN producto p ON vp.FO_producto = p.id_producto
                       INNER JOIN venta v ON vp.FO_venta = v.id_venta 
                       WHERE vp.id_vinculo LIKE '%$valor%' OR vp.FO_producto LIKE '%$valor%'
                       OR vp.FO_venta LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('El producto no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>