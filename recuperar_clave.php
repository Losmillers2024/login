<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Olvido de Password</title>
	<link rel="stylesheet" type="text/css" href="./estilos.css">

</head>
<body>
	<form action="recuperar_clave.php" method="post">
		EMAIL<input type="email" name="email" placeholder="Ingrese Email">
		<br><input type="submit" value="Enviar">
	</form>

	<?php 
	include ("dbconn.php");
    session_start(); // Start the session for error messages

	if (isset($_POST['email']) && !empty($_POST['email'])) {
		//Conexion con la base
		    include ("dbconn.php");
		//$conex = mysqli_connect("localhost", "root", "", "nusuario");

        // Check for connection errors
        if (mysqli_connect_errno()) {
            echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
            exit();
        }

		$email = mysqli_real_escape_string($conex, $_POST['email']);
		$c = "SELECT *, IFNULL(email, 'registronuevo') as email FROM registronuevo WHERE email='$email' LIMIT 1";
		$f = mysqli_query($conex, $c);
		$a = mysqli_fetch_assoc($f);
		if (!$a) {
			$_SESSION['error'] = 'Usuario inexistente';
			echo "<p style='color: red;'>Usuario inexistente.</p>";
			//header( "Location: ../" ); // Re-enable if you have a main index page for errors
			//die(); // Use exit() instead of die() for cleaner termination
            exit();
		}
		//generar una clave aleatoria y el token

		$token = md5($a['email'] . time() . rand(1000, 9999));
		$clave_nueva = rand(10000000, 99999999);
		$idusuario = $a['email']; // This line is not used in the original code but kept for context if needed
		$c2 = "INSERT INTO recuperar SET email='$email', TOKEN='$token', FECHA_ALTA=NOW(), CLAVE_NUEVA='$clave_nueva' ON DUPLICATE KEY UPDATE TOKEN='$token', CLAVE_NUEVA='$clave_nueva'";
		mysqli_query($conex, $c2);

		$link = "http://localhost/loginariza	/recuperar_clave_confirmar.php?e=$email&t=$token";

		//envío de mail (simulated for this setup)
		$mensaje = <<<EMAIL
		<p>Hola {$a['email']}</p>
		<p>Has solicitado recuperar tu contraseña. El sistema te ha generado una nueva clave que es: <code style='background: lightyellow; color: darkred; padding: 1px 2px;'>$clave_nueva</code></p>
		<p>Pero antes de poder usarla, deberás hacer <a href='$link'>clic en este vínculo</a> o copiar este código en la URL de tu navegador</p>
		<code style='background: black; color: white; padding: 4px;'>$link</code>
		<p>Si tú no has hecho esta solicitud, ignora el presente mensaje</p>
		EMAIL;

		echo $mensaje;
        echo "<p style='color: green;'>Se ha enviado un correo electrónico con las instrucciones para recuperar su contraseña. Por favor, revise su bandeja de entrada.</p>";


		//enviar ese mail 
		//redireccionar al formulario....
        mysqli_close($conex); // Close the database connection
	}
	?>
    <p><a href="index.php">Volver a la página de inicio de sesión</a></p>
</body>
</html>