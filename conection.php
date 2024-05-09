<?php
    $servidor = "localhost";
    $user = "root";
    $password = "";
    $bd = "vci_admin";

    $conexion = mysqli_connect($servidor,$user,$password) or die('Conexión a servidor no encontrada.');
    mysqli_select_db($conexion, $bd) or die('Conexión a base de datos no encontrada.');
    mysqli_set_charset ($conexion,"utf8");
    //echo "Conexión a servidor y base de datos exitosa.";

?>