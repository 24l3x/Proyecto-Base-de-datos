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
    <title>Asignaciones</title>s
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
    <div class="container">
        <form method="POST">
            <br>
            <h1>Hagamos una asignacion!</h1>
            <input type="number" placeholder="Numero de empleado" name="num_empleado" require>
            <input type="number" placeholder="Numero de maquina" name="num_maquina"require>
            <div class="tec">
                <input type="radio" name="turno" value="matutino" require>Matutino
                <input type="radio" name="turno" value="vespertino" require>Vespertino
            </div>
            <div class="tec">
                <input type="date" name="f_inicio">
                <input type="date" name="f_fin"> 
                <br>
                <label for="f_inicio">Fecha inicio</label>
                <label for="f_fin">Fecha fin</label>
            </div>
            <button type="submit" name="Registrar">Hacer asignación</button>
            <br>
        </form>
    </div>
</div>

<div class="bod"> <h1>Asignaciones</h1> </div>
</body>

<?php
if(isset($_POST['Registrar'])){

    $num_empleado = $_POST['num_empleado'];
    $num_maquina = $_POST['num_maquina'];
    $turno = $_POST['turno'];
    $f_inicio = $_POST['f_inicio'];
    $f_fin = $_POST['f_fin'];
    
    $insertarDatos = "INSERT INTO Asignacion 
        (num_maquina, num_empleado, turno, f_inicio, f_fin) 
        VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($enlace, $insertarDatos);

    mysqli_stmt_bind_param($stmt, "iisss", 
        $num_maquina,
        $num_empleado,
        $turno,
        $f_inicio,
        $f_fin,
    );

    if(mysqli_stmt_execute($stmt)){
        echo "Asignacion guardada con éxito";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
}
?>
</html>