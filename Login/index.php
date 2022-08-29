<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/form.css">
    <title>| Iniciar Sesión |</title>
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

        <form method="post" action="./logic/login.php">
            <input name="email" type="email" placeholder="Correo electrónico" required>
            <input name="password" type="password" placeholder="Contraseña" required>
            <input class="input-submit" type="submit" value="Iniciar sesión">
        </form>
        <div class="login-container">
            <a href="./path/signup.php" class="btn-login">Registrarse</a>
        </div>
    </main>
</body>
</html>