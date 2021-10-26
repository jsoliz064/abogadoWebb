<?php

include 'conexionpg.php';

/* $email=$_POST['usuario'];
$password=$_POST['password']; */

/* $sentencia=$conexion->query("SELECT * FROM expedientes"); */
$sentencia=$conexion->query("SELECT MAX(id) AS id FROM expedientes");
$fila=$sentencia->fetch(PDO::FETCH_ASSOC);
/* $fila2=$sentencia->fetchAll(); */

if ($fila) {
    /* $fila3=$fila2[3]; */
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}
$sentencia=null;
$conexion=null;



