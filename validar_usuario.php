<?php
include 'conexion.php';
$email=$_POST['usuario'];
$password=$_POST['password'];

/* $password="1234";
$email="jsoliz064@gmail.com"; */

$sentencia=$conexion->prepare("SELECT * FROM users WHERE email=? AND password=?");
$sentencia->bind_param('ss',$email,$password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
         echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}
$sentencia->close();
$conexion->close();
?>