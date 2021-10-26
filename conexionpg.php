<?php
use Illuminate\Support\Facades\Hash;
$contraseña = "015340";
$usuario = "postgres";
$nombreBaseDeDatos = "abogadoweb";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$host = "localhost";
$puerto = "5432";
/* try {
    $conexion = pg_connect("host=localhost port=5432 dbname=abogadoweb user=postgres password=015340");
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
} */
try {
    $conexion = new PDO("pgsql:host=$host;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>