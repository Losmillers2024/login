<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="./estilos.css">

</head>
<body>
    <?php
    //Conexion con la base
    include ("dbconn.php");
    //$conex = mysqli_connect("localhost","root","","nusuario");
    ?>
    <form action="alta.php" method="post">
    Nombre <input type="text" name="nombre" placeholder="Nuevo Nombre"><br>
    Apellido <input type="text" name="apellido" placeholder="Nuevo Apellido"><br>
    Email <input type="text" name="email" placeholder="Ingresar Email"><br>
    Usuario <input type="text" name="User" placeholder="Ingresar Usuario"><br>
    Password <input type="password" name="password" placeholder="Ingrese Contraseña"><br>
    Confirmar Password <input type="password" name="Cpassword" placeholder="Confirme Contraseña"><br>
    <input type="submit" name="Enviar" value="Registrar">
    </form>

    <?php    
    if(isset($_POST['Enviar'])) {
        if(strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido'] >= 1 ) && strlen($_POST['email']) >= 1 && strlen($_POST['User']) >= 1 && strlen($_POST['password']) >= 1 && $_POST['password'] === $_POST['Cpassword']) {
            $nombre=trim($_POST['nombre']);
            $apellido=trim($_POST['apellido']);
            $email=trim($_POST['email']);
            $User=trim($_POST['User']);
            $password = $_POST['password'];
            $pass_cifrada = password_hash($password,PASSWORD_DEFAULT, array("cost"=>10));
            $consulta = "INSERT INTO registronuevo (nombre, apellido, email, user, pass) VALUES ('$nombre','$apellido','$email','$User','$pass_cifrada')";
            $resultado = mysqli_query($conex,$consulta);
            if ($resultado) {
                echo '<h3 class="ok">¡Te has inscripto correctamente! Ahora puedes iniciar sesión.</h3>';
                header("Location: index.php"); // Redirect to login page after successful registration
                exit();
            } else {
                echo '<h3 class="bad">¡Ups ha ocurrido un error al registrar!</h3>';
            }
        }   else {
                echo '<h3 class="bad">¡Por favor complete todos los campos y asegúrese que las contraseñas coincidan!</h3>';
        }
    }
    ?>
</body>
</html>