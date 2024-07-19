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

        public function max() {
            $con = "SELECT MAX(id_venta) FROM venta";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function c_total() {
            $con = "SELECT SUM(total) FROM venta";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function count() {
            $con = "SELECT COUNT(nombre) FROM producto WHERE nombre IS NOT NULL";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO venta(id_venta, fecha, FO_usuario_vendedor, FO_cliente, productos_venta, total) 
                    VALUES('$params->id_venta','$params->fecha','$params->FO_usuario_vendedor','$params->FO_cliente',
                    '$params->productos_venta','$params->total')";
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
                       FO_cliente = '$params->FO_cliente', productos_venta = '$params->productos_venta', total = '$params->total'
                       WHERE id_venta = $id";
            mysqli_query($this->conexion, $editar) or die('la venta no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta ha sido actualizada";
            return $vec;
        }

        public function expand($id){
            $exp = "SELECT productos_venta from venta WHERE id_venta = $id";
            $res = mysqli_query($this->conexion, $exp);
            $row = mysqli_fetch_array($res);
            $vec = unserialize($row[0]);
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

        public function found($id) {
            $found = "SELECT * FROM venta WHERE id_venta = $id";
            $res=mysqli_query($this->conexion, $found) or die('la venta no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>