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
    <title>Alta de Técnico</title>
</head>
<body>
<header>
        <nav>
            <div class="left">
                <a href="index.php"><H1>FABRICA DE JUGUETES</H1></a>
            </div>
            <div class="right">
                <a href="Registro.php">Registrar administrador</a>
                <a href="juguete.php">Insertar jueguete</a>
                <a href="tecnico.php">Dar de alta tecnico</a>
                <a href="asignacion.php">Asignaciones</a>
                <a href="maquina.php">Insertar maquina</a>
            </div>                
        </nav>
</header>
<div class="bod">
<div class="container" id="container">
    <form method="POST">
        <br>
        <h1>Registrar Nuevo Tecnico</h1>    
        <input type="number" name="num_empleado" placeholder="Número de Empleado" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="number" name="tel_contancto" placeholder="Número de contacto">

        <hr>
            <h4>Tipo de tecnico:</h4>
            <div class="tec">
                <input type="radio" id="industrial" name="tipo_tecnico" value="industrial" onclick="mostrarCampos('industrial')" required>
                <label for="industrial">Industrial</label> 
                <input type="radio" id="textil" name="tipo_tecnico" value="textil" onclick="mostrarCampos('textil')" required>
                <label for="textil">Textil</label>       
            </div>

            <div id="campos_industrial" style="display:none;">
                <input type="text" name="especialidad" placeholder="Especialidad">
            </div>

            <div id="campos_textil" style="display:none;">
                <input type="text" name="experiencia" placeholder="Experiencia">
            </div>
        
        

        <hr>
    
        <button type="submit" name="Registrar">Guardar Técnico</button>
        <br>
    </form>
</div><!-- Fin div container -->
</div><!-- Fin div body -->
<script src = "script.js"></script>

</body>
<?php
if(isset($_POST['Registrar'])){

    // 1. Recibe todos los campos
    $num_empleado = $_POST['num_empleado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tel_contancto = $_POST['tel_contancto'];
    $tipo_tecnico = $_POST['tipo_tecnico']; // 'industrial' o 'textil'
    
    // 2. Prepara las variables de especialidad/experiencia
    $especialidad = null;
    $experiencia = null;

    if ($tipo_tecnico === 'industrial') {
        $especialidad = $_POST['especialidad']; // Toma el valor
    } else if ($tipo_tecnico === 'textil') {
        $experiencia = $_POST['experiencia']; // Toma el valor
    }

    // 3. El INSERT COMPLETO con 7 campos
    $insertarDatos = "INSERT INTO Tecnico 
        (num_empleado, nombre, apellido, tel_contancto, tipo_tecnico, especialidad, experiencia) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

    // 4. Preparar la sentencia
    $stmt = mysqli_prepare($enlace, $insertarDatos);

    // 5. Unir las variables
    // i = integer, s = string
    mysqli_stmt_bind_param($stmt, "ississs", 
        $num_empleado,
        $nombre,
        $apellido,
        $tel_contancto,
        $tipo_tecnico,
        $especialidad,  // PHP y MySQL manejan el NULL automáticamente aquí
        $experiencia    // PHP y MySQL manejan el NULL automáticamente aquí
    );

    // 6. Ejecutar
    if(mysqli_stmt_execute($stmt)){
        echo "Técnico guardado con éxito";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
}
?>
</html>