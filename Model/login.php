<?php

    class Login {
        //atributo
        public $conexion;

        //metodo constructor de conexion
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos generales
        public function consulta($email, $passwrd) {
            $con = "SELECT u.*, r.rol AS rol FROM usuario u 
                    INNER JOIN rol r ON u.FO_rol = r.id_rol 
                    WHERE correo='$email' && contrasenia=SHA1('$passwrd')";
            $res = mysqli_query($this->conexion, $con) or die('no se puede conectar con la base de datos.');
            $vec = [];
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            if($vec == []){
                $vec [0] = array("access" => "denied") ;
            }else{
                $vec [0] ['access'] = "granted" ;
            }

            return $vec;
        }
    }
?>