<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Validate Form</title>
</head>
<body>
<?php   
    //adm database
    $server = 'DESKTOP-4027O50\PRUEBA3';
    $connectionInfo = ['Database' => 'login'];
    $connection = sqlsrv_connect($server, $connectionInfo);

    //user inputs
    $email =  $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT P.correo, U.password FROM Persona P inner join Usuario U on P.identificacion = U.identificacion WHERE P.correo = '$email' AND U.password = '$password'";
    $query = sqlsrv_query($connection, $sql);
    $response = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);

    if($response){
        session_start();
        $userInfoQuery = "SELECT P.nombre, U.usuario FROM Persona P inner join Usuario U on P.identificacion = U.identificacion WHERE P.correo = '$email' AND U.password = '$password'";
        $queryAction = sqlsrv_query($connection, $userInfoQuery);
        $responseUserInfo = sqlsrv_fetch_array( $queryAction, SQLSRV_FETCH_ASSOC);

        $index = 'usuario';
        $_SESSION["user"] = "$responseUserInfo[$index]";
        $index = 'nombre';
        $_SESSION["name"] = "$responseUserInfo[$index]";
        $user = $_SESSION["user"];
        $sql_insert = "INSERT INTO Log_Sesion VALUES('$user','Inicio de sesion',GETDATE())";
        $sql_execute = sqlsrv_query($connection, $sql_insert);

        header("Location: http://localhost/Login/path/dashboard.php");
        exit;
    }
?>
<script  type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Acceso denegado.',
        showConfirmButton: false,
        text: 'Correo no registrado o datos incorrectos.',
        footer: '<a href="http://localhost/Login/index.php" style="text-decoration: none; font-family: sans-serif; ">Volver al inicio</a>'
    });
    
</script>
</body>
</html>