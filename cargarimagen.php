<?php
    include 'conexionpg.php';
    $nomImagen = $_POST['nom'];
    $imagen = $_POST['imagenes'];
    //traer el ultimo id del documento perteneciente al expediente
    $sentencia=$conexion->query("SELECT MAX(id) AS id FROM documentos");
    $fila=$sentencia->fetch(PDO::FETCH_ASSOC);
    $numero="0";
    if ($fila){
        $numero=(int)$fila["id"]+1;
    }
    $name=$nomImagen . $numero;
    // RUTA DONDE SE GUARDARAN LAS IMAGENES
    $path = "documentos/$name.png";
    $actualpath = "http://localhost/abogadoweb/$path";
    //insertar tupla a documentos
    $id_expediente="3";
    date_default_timezone_set("America/La_Paz");
    $fecha=getdate();
    $fechaactual=$fecha["year"] . "-" . $fecha["mon"] . "-" . $fecha["mday"] . " " . $fecha["hours"] . ":" . $fecha["minutes"] . ":" . $fecha["seconds"]; 
    $sql = "INSERT INTO documentos (id_expediente, ruta, created_at) VALUES (?,?,?)";
    $stmt= $conexion->prepare($sql);
    $stmt->execute([$id_expediente, $path, $fechaactual]);
 
    
    file_put_contents($path, base64_decode($imagen));
    
    echo "SE SUBIO EXITOSAMENTE";
    
?>