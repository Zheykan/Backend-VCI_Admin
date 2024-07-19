<?php

    class User {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta() {
            $con = "SELECT u.*, r.rol AS rol FROM usuario u 
                    INNER JOIN rol r ON u.FO_rol = r.id_rol 
                    ORDER BY nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
        public function count() {
            $con0 = "SELECT COUNT(nombre) FROM usuario WHERE FO_rol = 1";
            $con1 = "SELECT COUNT(nombre) FROM usuario WHERE FO_rol = 2";
            $con2 = "SELECT COUNT(nombre) FROM usuario WHERE FO_rol = 3";
            $con3 = "SELECT COUNT(nombre) FROM usuario WHERE FO_rol = 4";
            $res = mysqli_query($this->conexion, $con0);
            $vec0 = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec0[] = $row;
            }
            $res = mysqli_query($this->conexion, $con1);
            $vec1 = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec1[] = $row;
            }
            $res = mysqli_query($this->conexion, $con2);
            $vec2 = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec2[] = $row;
            }
            $res = mysqli_query($this->conexion, $con3);
            $vec3 = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec3[] = $row;
            }
            return [$vec0,$vec1,$vec2,$vec3];
        }

        public function insertar($params) {
            $ins = "INSERT INTO usuario(nombre, contrasenia, telefono, correo, FO_rol, caja)
            VALUES('$params->nombre', SHA1('$params->contrasenia'), '$params->telefono', '$params->correo', 
            '$params->FO_rol', '$params->caja')";
            mysqli_query( $this->conexion, $ins) or die('el usuario no se ha podido almacenar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "el usuario ha sido almacenado";
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM usuario WHERE id_usuario = $id";
            mysqli_query($this->conexion, $del) or die('el usuario no se ha podido eliminar porque ya se elimino');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "el usuario ha sido eliminado";
            return $vec;
        }

        public function editar($id, $params) {
            $editar = "UPDATE usuario SET nombre = '$params->nombre', 
                       contrasenia = SHA1('$params->contrasenia'), telefono = '$params->telefono', 
                       correo = '$params->correo', FO_rol = '$params->FO_rol', caja = '$params->caja' 
                       WHERE id_usuario = $id";
            mysqli_query($this->conexion, $editar) or die('el usuario no se ha podido actualizar');
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "el usuario ha sido actualizado";
            return $vec;
        }

        public function filtrar($valor) {
            $filtro = "SELECT u.*, r.rol AS rol FROM usuario u 
                       INNER JOIN rol r ON u.FO_rol = r.id_rol 
                       WHERE nombre LIKE '%$valor%' OR r.rol LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('el usuario no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function compare($valor) {
            $filtro = "SELECT * FROM usuario WHERE correo LIKE '%$valor%'";
            $res=mysqli_query($this->conexion, $filtro) or die('el usuario no se ha podido encontrar');
            $vec = [];
            while($row=mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>