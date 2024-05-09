<?php

    class Product {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT p.*, m.nombre AS marca, un.nombre AS unidad_med FROM producto p
                    INNER JOIN marca m ON p.FO_marca = m.id_marca
                    INNER JOIN unidad_medida un ON p.FO_unidad = un.id_unidad            
                    ORDER BY p.id_producto";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO producto(nombre, FO_marca, cantidad_producto, medida, FO_unidad, precio_venta, fecha_venc) 
                    VALUES('$params->nombre', '$params->FO_marca', '$params->cantidad_producto', '$params->medida', 
                    '$params->FO_unidad', '$params->precio_venta', '$params->fecha_venc')";
            mysqli_query( $this->conexion, $ins) or die('el producto no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM producto WHERE id_producto = $id";
            mysqli_query($this->conexion, $del) or die('el producto no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE producto SET nombre = '$params->nombre', FO_marca = '$params->FO_marca', 
                       cantidad_producto = '$params->cantidad_producto', medida = '$params->medida', 
                       FO_unidad = '$params->FO_unidad', precio_venta = '$params->precio_venta', 
                       fecha_venc = '$params->fecha_venc' 
                       WHERE id_producto = $id";
            mysqli_query($this->conexion, $editar) or die('el producto no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT p.*, m.nombre AS marca, un.nombre AS unidad_med FROM producto p
                       INNER JOIN marca m ON p.FO_marca = m.id_marca
                       INNER JOIN unidad_medida un ON p.FO_unidad = un.id_unidad 
                       WHERE p.id_producto LIKE '%$valor%' OR p.nombre LIKE '%$valor%' 
                       OR m.nombre LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('El producto no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>