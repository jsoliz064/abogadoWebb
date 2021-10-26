<?php

include 'conexionpg.php';

$email=$_POST['usuario'];
$password=$_POST['password'];

$sentencia=$conexion->prepare("SELECT password FROM users WHERE email=?");
$sentencia->execute([$email]);
$fila=$sentencia->fetch(PDO::FETCH_ASSOC);

if ($fila && password_verify($password,$fila['password'])){
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
} 

/* codigo simple */
/* $sentencia=pg_query($conexion,"SELECT * FROM users WHERE email=email and password=password"); */
/* if ($fila=pg_fetch_assoc($sentencia)) {
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);       
}
pg_close($conexion); */
$sentencia=null;
$conexion=null;