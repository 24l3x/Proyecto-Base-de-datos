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
    <title>Registro de juguetes</title>
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
<div class="bod">
    <section class="container">
        <br>
            <form action="#" name="Datos" method="post">
            <h1>Registra un juguete</h1>
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="tipo" placeholder="Tipo">
            <div class="tec">
                <input type="radio" id="cosido" name="n_planta" value="Cosido">
                <label for="cosido">Cosido</label>
                <input type="radio" id="electronica" name="n_planta" value="Electronica">
                <label for="electronica">Electronica</label>
                <input type="radio" id="moldes" name="n_planta" value="Moldes">
                <label for="moldes">Moldes</label>
            </div>
            <button type="submit" name="Registrar">Guardar juguete</button>
            <br>
    </section>
</div>


<div class="bod"> <h1>Registro jueguetes</h1> </div>
</body>

<?php
if(isset($_POST['Registrar'])){

    $id_juguete = $_POST['id_juguete'];
    $tipo = $_POST['tipo'];
    
    $insertarDatos = "INSERT INTO Juguete 
        (id_juguete, tipo 
        VALUES (?, ?)";

    $stmt = mysqli_prepare($enlace, $insertarDatos);

    mysqli_stmt_bind_param($stmt, "is", 
        $id_juguete,
        $tipo
    );

    if(mysqli_stmt_execute($stmt)){
        echo "Juguete guardado con éxito";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
}
?>

</html>