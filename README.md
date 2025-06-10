
# Sistema de Gestión de Usuarios con Recuperación de Clave

Este sistema web permite registrar usuarios, iniciar sesión y recuperar contraseñas mediante un token generado automáticamente. Es ideal para entornos educativos, prácticas de desarrollo y sistemas internos.

---

## Requisitos del sistema

- Servidor con Apache y PHP 8.0 o superior
- Base de datos MySQL o MariaDB
- phpMyAdmin (opcional, recomendado para facilitar la importación)
- Navegador web moderno
- (Opcional) Servidor SMTP o integración con PHPMailer si se desea envío real de correos

---

## Estructura del proyecto

```
/tu_proyecto/
├── accesocorrecto.php
├── alta.php
├── dbconn.php
├── index.php
├── ingreso.php
├── logout.php
├── nusuario.sql
├── recuperar_clave.php
└── recuperar_clave_confirmar.php
```

---

## Pasos para desplegar el sistema en otro equipo

### 1. Preparar el entorno

Podés usar un paquete como XAMPP, WAMP, MAMP o Laragon. Asegurate de que los servicios de Apache y MySQL estén activos.

### 2. Copiar los archivos del proyecto

Ubicá todos los archivos listados anteriormente dentro de la carpeta raíz del servidor web local (por ejemplo, `htdocs` en XAMPP o `www` en WAMP).

### 3. Importar la base de datos

1. Abrí phpMyAdmin.
2. Creá una nueva base de datos llamada `nusuario`.
3. Importá el archivo `nusuario.sql` desde la pestaña "Importar".

Este archivo creará las siguientes tablas:
- `registronuevo`: almacena los datos de los usuarios registrados.
- `recuperar`: almacena tokens y claves temporales para recuperación de contraseña.

### 4. Configurar la conexión a la base de datos

Editá el archivo `dbconn.php` y ajustá los valores según tu entorno:

```php
$servername = "localhost";
$username = "root"; // o el usuario configurado
$password = "";     // la contraseña de MySQL
$database = "nusuario";
```

Guardá los cambios.

### 5. Probar el sistema

Desde el navegador, accedé a:

```
http://localhost/tu_proyecto/index.php
```

Podrás:
- Registrar nuevos usuarios (`alta.php`)
- Iniciar sesión (`ingreso.php`)
- Recuperar claves (`recuperar_clave.php`)
- Confirmar cambio de clave mediante token (`recuperar_clave_confirmar.php`)
- Cerrar sesión (`logout.php`)

### 6. Envío de correos (opcional)

Por defecto, el sistema muestra el token en pantalla. Si querés enviar correos reales:

1. Instalar PHPMailer (por Composer o manualmente).
2. Configurar los parámetros SMTP en `recuperar_clave.php`.
3. Reemplazar el `echo` del enlace por una función que use PHPMailer.

Ejemplo básico con PHPMailer:

```php
$mail->isSMTP();
$mail->Host = 'smtp.tuservidor.com';
$mail->SMTPAuth = true;
$mail->Username = 'usuario@dominio.com';
$mail->Password = 'contraseña';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
```

---

## Créditos

Proyecto desarrollado por [Tu Nombre o Equipo]  
Fecha de desarrollo: Junio 2025
