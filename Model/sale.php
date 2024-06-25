<?php

    class Sale {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT v.*, u.nombre AS vendedor, c.nombre_apellido AS cliente FROM venta v
                    INNER JOIN usuario u ON v.FO_usuario_vendedor = u.id_usuario 
                    INNER JOIN cliente c ON v.FO_cliente = c.id_cliente
                    ORDER BY v.fecha";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO venta(fecha, FO_usuario_vendedor, FO_cliente, productos_venta, 
                    cantidad_venta, subtotal, impuestos, total) 
                    VALUES('$params->fecha', '$params->FO_usuario_vendedor', '$params->FO_cliente', 
                    '$params->productos_venta', '$params->cantidad_venta', '$params->subtotal', 
                    '$params->impuestos', '$params->total')";
            mysqli_query( $this->conexion, $ins) or die('la venta no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta ha sido almacenada";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM venta WHERE id_venta = $id";
            mysqli_query($this->conexion, $del) or die('la venta no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta ha sido eliminada";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE venta SET fecha = '$params->fecha', FO_usuario_vendedor = '$params->FO_usuario_vendedor', 
                       FO_cliente = '$params->FO_cliente', productos_venta = '$params->productos_venta', 
                       cantidad_venta = '$params->cantidad_venta', subtotal = '$params->subtotal', 
                       impuestos = '$params->impuestos', total = '$params->total'
                       WHERE id_venta = $id";
            mysqli_query($this->conexion, $editar) or die('la venta no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta ha sido actualizada";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT v.*, u.nombre AS vendedor, c.nombre_apellido AS cliente FROM venta v
                       INNER JOIN usuario u ON v.FO_usuario_vendedor = u.id_usuario 
                       INNER JOIN cliente c ON v.FO_cliente = c.id_cliente 
                       WHERE v.id_venta LIKE '%$valor%' OR v.fecha LIKE '%$valor%' 
                       OR u.nombre LIKE '%$valor%' OR v.FO_cliente LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('la venta no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>