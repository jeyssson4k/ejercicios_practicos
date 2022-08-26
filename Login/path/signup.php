<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>| Registrarse |</title>
</head>
<body>
    <div id="alert"></div>
    <main>
        <div class="user-logo-container">
            <div class="user-logo">
                <div class="user-logo-head"></div>
                <div class="user-logo-body"></div>
            </div>
        </div>

        <form action="">
            <input type="text" placeholder="Nombre" required>
            <input type="email" placeholder="Correo electrónico" required>
            <input type="password" placeholder="Contraseña" required>
            <input type="password" placeholder="Confirmar contraseña" required>
            <input class="input-submit" type="submit" value="Registrarse">
        </form>

        <div class="login-container">
            <a href="../index.php" class="btn-login">Inciar sesión</a>
        </div>
    </main>
</body>
</html>