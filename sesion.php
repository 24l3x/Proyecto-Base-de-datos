<?php
$servidor = "db";
$usuario = "root";
$clave = "host";
$baseDeDatos = "Fabrica";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
$error_login = "";

// --- Redirigir si ya está logueado ---
// Si ya tiene "credencial", que no vea el login, que se vaya a inicio.php
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    header('Location: inicio.php');
    exit;
}

// --- Lógica del Login (Solo si se envió el formulario) ---
if (isset($_POST['Registrar'])) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];


    $consulta = "SELECT password_hash FROM sesion WHERE usuario = ?";

    $stmt = mysqli_prepare($enlace, $consulta);

    mysqli_stmt_bind_param($stmt, "s", $user);

    if (mysqli_stmt_execute($stmt)) {
        
        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) === 1) {
            
            $fila = mysqli_fetch_assoc($resultado);
            $hash_guardado = $fila['password_hash'];

            if (password_verify($pass, $hash_guardado)) {
                
                $_SESSION['autenticado'] = true;
                $_SESSION['usuario'] = $user;

                header('Location: tecnico.php');
                exit; 
                
            } else {

                $error_login = "Usuario o contraseña incorrectos.";
            }
        } else {

            $error_login = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error_login = "Error en la consulta: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
}
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