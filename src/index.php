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
    <title>Inicio</title>
</head>
<body>
<header>
        <nav>
            <div class="left">
                <a href="index.php"><H1>FABRICA DE JUGUETES</H1></a>
            </div>
            <div class="right">
                <a href="sesion.php">Iniciar sesión</a>
            </div>                
        </nav>
</header>
<div class="bod"> 
    <h1>Bienvenido a la fabrica</h1> 
    <section class="container">
        <br>
        <h2>Catalogo</h2>
        <table class="catalogo">
            <tr>
                <td><img src="img/1.jpg" name="Stitch"><br><label for="Stitch">Stitch</label></td>
                <td><img src="img/2.jpg" name="Peliroja"><br><label for="Peliroja">Peliroja</label></td>
                <td><img src="img/3.jpg" name="HollowKnight"><br><label for="HollowKnight">Caballerito</label></td>
            </tr>
             <tr>
                <td><img src="img/4.jpg" name="Mustang"><br><label for="Mustang">Mustang</label></td>
                <td><img src="img/5.jpg" name="Porsche"><br><label for="Porsche">Porsche</label></td>
                <td><img src="img/6.jpg" name="Mcqueen"><br><label for="Mcqueen">Mcqueen</label></td>
            </tr>
        </table>
        <br>
    </section>
</div>
</body>
</html>