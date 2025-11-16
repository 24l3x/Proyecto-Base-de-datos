<?php
// --- Conexión a la BD ---
$servidor = "db";
$usuario = "root";
$clave = "host";
$baseDeDatos = "Fabrica";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

// Variable para mensajes de error
$error_login = "";

// --- Redirigir si ya está logueado ---
// Si ya tiene "credencial", que no vea el login, que se vaya a inicio.php
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    header('Location: inicio.php');
    exit;
}

// --- Lógica del Login (Solo si se envió el formulario) ---
if (isset($_POST['Registrar'])) {

    // 1. Recibe todos los campos
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // 2. El "molde" (¡Corregido!)
    // Buscamos el HASH de la tabla SESION donde el USUARIO sea el que buscamos
    $consulta = "SELECT password_hash FROM sesion WHERE usuario = ?";

    // 4. Preparar la sentencia
    $stmt = mysqli_prepare($enlace, $consulta);

    // 5. Unir las variables
    // Solo le pasamos el 'user' (un string "s")
    mysqli_stmt_bind_param($stmt, "s", $user);

    // 6. Ejecutar
    if (mysqli_stmt_execute($stmt)) {
        
        $resultado = mysqli_stmt_get_result($stmt);

        // 7. ¿Encontramos al usuario?
        if (mysqli_num_rows($resultado) === 1) {
            
            $fila = mysqli_fetch_assoc($resultado);
            $hash_guardado = $fila['password_hash']; // El hash de la BD

            // 8. ¡LA VERIFICACIÓN MÁGICA!
            // Compara la contraseña del form ($pass) con el hash de la BD
            if (password_verify($pass, $hash_guardado)) {
                
                // ¡¡ÉXITO!! Las contraseñas coinciden
                
                // 9. Le damos al usuario su "credencial" de sesión
                $_SESSION['autenticado'] = true;
                $_SESSION['usuario'] = $user;

                // 10. Lo mandamos a la página privada
                header('Location: tecnico.php');
                exit; // ¡Detener script!
                
            } else {
                // Contraseña incorrecta
                $error_login = "Usuario o contraseña incorrectos.";
            }
        } else {
            // Usuario no existe
            $error_login = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error_login = "Error en la consulta: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
}
// El script de PHP termina aquí.
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
        </nav>
</header>
<div class="bod">
<div class="container" id="container">
    <form method="POST">
        <br>
        <h1>Hola de Nuevo</h1>    
            <input type="text" name="user" placeholder="Usuario">
            <input type="password" name="pass" placeholder="Contraseña">
        <button type="submit" name="Registrar">Iniciar sesión</button>
        <br>
    </form>
</div><!-- Fin div container -->
</div><!-- Fin div body -->

</body>
</html>