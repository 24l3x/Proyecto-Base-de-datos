<?php
// ¡¡Iniciamos la sesión ANTES de cualquier HTML!!
session_start();

// --- Conexión a la BD ---
$servidor = "db";
$usuario = "root";
$clave = "host";
$baseDeDatos = "Fabrica";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

$mensaje = ""; // Para mostrar éxito o error

// --- Lógica de Registro (Solo si se envió el formulario) ---
if (isset($_POST['RegistrarNuevo'])) {

    // 1. Recibes los datos del formulario
    $user_nuevo = $_POST['user_registro'];
    $pass_nuevo = $_POST['pass_registro'];

    // 2. Hasheas la contraseña (¡Igual que en tu script!)
    $hash_para_guardar = password_hash($pass_nuevo, PASSWORD_DEFAULT);

    // 3. El "molde" (¡Igual que en tu script!)
    $sql = "INSERT INTO sesion (usuario, password_hash) VALUES (?, ?)";
    
    // 4. Preparar y Unir (¡Igual que en tu script!)
    $stmt = mysqli_prepare($enlace, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_nuevo, $hash_para_guardar);

    // 5. Ejecutar y verificar
    if (mysqli_stmt_execute($stmt)) {
        $mensaje = "¡Usuario '$user_nuevo' creado con éxito! Ya puedes iniciar sesión.";
    } else {
        // Esto falla si el usuario ya existe (por la restricción UNIQUE)
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
        <button type="submit" name="RegistrarNuevo">Crear Cuenta</button>
        <br>
    </form>
</div>
</div>
</body>
</html>