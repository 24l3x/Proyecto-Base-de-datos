<?php
    $servidor = "db";
    $usuario = "root";
    $clave = "host";
    $baseDeDatos = "Fabrica";

    $enlace = mysqli_connect ($servidor,$usuario,$clave,$baseDeDatos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Alta de maquinas</title>
</head>
<body>
<header>
        <nav>
            <div class="left">
                <a href="index.php"><H1>FABRICA DE JUGUETES</H1></a>
            </div>
            <div class="right">
                <a href="juguete.php">Insertar jueguete</a>
                <a href="tecnico.php">Dar de alta tecnico</a>
                <a href="asignacion.php">Asignaciones</a>
                <a href="maquina.php">Insertar maquina</a>
            </div>                
        </nav>
</header>
<div class="bod"> <h1>Alta de maquinas</h1> </div>
</body>
</html>