<?php

    class Devolution {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT d.*, v.id_venta AS venta, u.nombre AS vendedor FROM devolucion d
                    INNER JOIN venta v ON d.FO_venta = v.id_venta
                    INNER JOIN usuario u ON d.FO_vendedor = u.id_usuario
                    ORDER BY d.fecha";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO devolucion(FO_venta, fecha, FO_vendedor, lista_dev, total) 
                    VALUES('$params->FO_venta', '$params->fecha', '$params->FO_vendedor',
                    '$params->lista_dev', '$params->total')";
            mysqli_query( $this->conexion, $ins) or die('la devolución no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La devolución ha sido almacenada";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM devolucion WHERE id_devolucion = $id";
            mysqli_query($this->conexion, $del) or die('la devolucion no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La devolucion ha sido eliminada";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE devolucion SET FO_venta = '$params->FO_venta', fecha = '$params->fecha', 
                       FO_vendedor = '$params->FO_vendedor', lista_dev = '$params->lista_dev', total = '$params->total'
                       WHERE id_devolucion = $id";
            mysqli_query($this->conexion, $editar) or die('la devolucion no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La devolucion ha sido actualizada";
            return $vec;
        }

        public function expand($id){
            $exp = "SELECT lista_dev from devolucion WHERE id_devolucion = $id";
            $res = mysqli_query($this->conexion, $exp);
            $row = mysqli_fetch_array($res);
            $vec = unserialize($row[0]);
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT d.*, v.id_venta AS venta, u.nombre AS vendedor FROM devolucion d
                       INNER JOIN venta v ON d.FO_venta = v.id_venta 
                       INNER JOIN usuario u ON d.FO_vendedor = u.id_usuario
                       WHERE d.id_devolucion LIKE '%$valor%' OR d.fecha LIKE '%$valor%' 
                       OR v.id_venta LIKE '%$valor%' OR u.nombre LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('la devolución no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>