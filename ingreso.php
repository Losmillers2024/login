<link rel="stylesheet" type="text/css" href="./estilos.css">
<?php
session_start(); // Start the session at the very beginning

// Conexion con la base
    include ("dbconn.php");
//$conex = mysqli_connect("localhost", "root", "", "nusuario"); // Corrected database name to 'nusuario'

// Check for connection errors
if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener las credenciales del formulario
$usuarios = $_POST['usuarios'];
$password = $_POST['password'];

// Prepare the SQL statement to prevent SQL injection
$stmt = mysqli_prepare($conex, "SELECT * FROM registronuevo WHERE user = ?");
mysqli_stmt_bind_param($stmt, "s", $usuarios);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['pass'];

    if (password_verify($password, $hashedPassword)) {
        // Contraseña correcta, iniciar sesión
        $_SESSION["usuarios"] = $usuarios;
        header("Location: accesocorrecto.php");
        exit(); // Important to exit after a header redirect
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta. <a href='index.php'>Volver a intentar</a>";
    }
} else {
    // Usuario inexistente
    echo "Usuario inexistente. <a href='index.php'>Volver a intentar</a>";
}

mysqli_stmt_close($stmt);
mysqli_close($conex);
?>