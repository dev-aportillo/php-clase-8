<?php
   include 'conexion.php';
   if ($conexion->errno) {
    echo "Problemas de conexión: " .$conexion->errno;
   }else{
    echo "Conexión establecida con la base de datos.";
   }
?>