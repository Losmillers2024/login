<link rel="stylesheet" type="text/css" href="./estilos.css">
<?php 
session_start(); // Start the session for messages

//Conexion con la base
    include ("dbconn.php");
//$conex = mysqli_connect("localhost","root","","nusuario");

// Check for connection errors
if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
    exit();
}

$email = $_GET['e'];
$token = $_GET['t'];

$c = "SELECT CLAVE_NUEVA FROM recuperar WHERE EMAIL='$email' AND TOKEN='$token' LIMIT 1 ";
$f = mysqli_query( $conex, $c );
$a = mysqli_fetch_assoc($f);
if( ! $a ){
	$_SESSION['error'] = 'Solicitud no encontrada o inválida.';
	echo "<p style='color: red;'>Solicitud no encontrada o inválida.</p>";
	//header("Location: ../); // Re-enable if you have a main index page for errors
	//die( ); // Use exit() instead of die() for cleaner termination
    exit();
}

//OBTENEMOS LA CLAVE Y ACTUALIZAMOS AL USUARIO
$clave = $a['CLAVE_NUEVA'];
$clave_ = password_hash($clave,PASSWORD_DEFAULT, array("cost"=>10));
$c2 = "UPDATE registronuevo SET pass='$clave_' WHERE email='$email' LIMIT 1";
mysqli_query($conex, $c2);

//ELIMINAR ESTA SOLICITUD DE RECUPERO

$c3 = "DELETE FROM recuperar WHERE EMAIL='$email' LIMIT 1";
mysqli_query($conex, $c3);

echo $_SESSION['rta'] = '<p style="color: green;">Contraseña actualizada satisfactoriamente, ya se puede loguear.</p>';
//header("Location: ../9.5/index.php"); // Correct the redirect path if needed
echo "<p><a href='index.php'>Ir a la página de inicio de sesión</a></p>";

mysqli_close($conex); // Close the database connection
?>