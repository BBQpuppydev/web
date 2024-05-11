<?php
    $host="localhost";
    $User="root";
    $pass="";

    $bd="iniciodesesiondb";
    $conexion=mysqli_connect($host,$User,$pass,$bd);
    if (!$conexion){
        echo"Conexion fallida";
    }