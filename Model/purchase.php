<?php

    class Purchase {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT c.*, p.razon_social AS proveedor FROM compra c
                    INNER JOIN proveedor p ON c.FO_proveedor = p.id_proveedor_nit 
                    ORDER BY c.id_compra";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO compra(FO_proveedor,fecha_adq,lista_prod,cantidad_adq,
                    preciop_compra,subtotal,impuestos,total) 
                    VALUES('$params->FO_proveedor','$params->fecha_adq','$params->lista_prod',
                    '$params->cantidad_adq','$params->preciop_compra','$params->subtotal',
                    '$params->impuestos','$params->total')";
            mysqli_query( $this->conexion, $ins) or die('la compra no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra ha sido almacenada";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM compra WHERE id_compra = $id";
            mysqli_query($this->conexion, $del) or die('la compra no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra ha sido eliminada";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE compra SET FO_proveedor = '$params->FO_proveedor', fecha_adq = '$params->fecha_adq',
                       lista_prod = '$params->lista_prod', cantidad_adq = '$params->cantidad_adq', 
                       preciop_compra = '$params->preciop_compra', subtotal = '$params->subtotal', 
                       impuestos = '$params->impuestos', total = '$params->total'
                       WHERE id_compra = $id";
            mysqli_query($this->conexion, $editar) or die('la compra no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra ha sido actualizada";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT c.*, p.razon_social AS proveedor FROM compra c
                       INNER JOIN proveedor p ON c.FO_proveedor = p.id_proveedor_nit 
                       WHERE c.id_compra LIKE '%$valor%' OR c.FO_proveedor LIKE '%$valor%' 
                       OR p.razon_social LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('la compra no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>