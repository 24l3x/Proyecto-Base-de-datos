<?php
$servidor = "db";
$usuario = "root";
$clave = "host";
$baseDeDatos = "Fabrica";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

$mensaje = ""; // Para mostrar éxito o error


if (isset($_POST['Registrar'])) {
    $user_nuevo = $_POST['user_registro'];
    $pass_nuevo = $_POST['pass_registro'];

    $hash_para_guardar = password_hash($pass_nuevo, PASSWORD_DEFAULT);

    $sql = "INSERT INTO sesion (usuario, password_hash) VALUES (?, ?)";
    
    $stmt = mysqli_prepare($enlace, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_nuevo, $hash_para_guardar);

    if (mysqli_stmt_execute($stmt)) {
        $mensaje = "¡Usuario '$user_nuevo' creado con éxito! Ya puedes iniciar sesión.";
    } else {

        $mensaje = "Error: Ese nombre de usuario ya existe.";
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bod">
<div class="container" id="container">
    <form method="POST"> <br>
        <h1>Registro</h1> 
        
        <?php
        if (!empty($mensaje)) {
            echo "<p style='font-size: 14px;'>$mensaje</p>";
        }
        ?>
        
        <input type="text" name="user_registro" placeholder="Nuevo Usuario" required>
        <input type="password" name="pass_registro" placeholder="Nueva Contraseña" required>
        <button type="submit" name="Registrar">Crear Cuenta</button>
        <br>
    </form>
</div>
</div>
</body>
</html>