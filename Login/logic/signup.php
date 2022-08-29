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
    $name = $_POST['name'];
    $id = $_POST['cc'];
    $email =  $_POST['email'];
    $pass = md5($_POST['password']);  
    $conf_pass = md5($_POST['confirm-password']);

    $full_name = explode(" ", $name, 2);
    $first_name = $full_name[0];
    $last_name = $full_name[1];

    $sql = "SELECT P.correo, U.identificacion FROM Persona P inner join Usuario U on P.identificacion = U.identificacion WHERE P.correo = '$email' ";
    $query = sqlsrv_query($connection, $sql);
    $response = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);
    
    if($response == null && $pass == $conf_pass){

        $sql_create_user = "INSERT INTO Persona VALUES ($id, '$first_name', '$last_name', '$email')";
        $query_create_user = sqlsrv_query($connection, $sql_create_user);
        
        $identity = rand(0,1000);
        $sql_create_access = "INSERT INTO Usuario VALUES ($id, '$first_name$identity', '$pass')";
        $query_create_access = sqlsrv_query($connection, $sql_create_access);

        header("Location: http://localhost/Login/index.php");
        exit;
        
    }
?>

<script  type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Acceso denegado.',
        showConfirmButton: false,
        text: 'Usuario ya registrado o contraseñas no coinciden.',
        footer: '<a href="http://localhost/Login/path/signup.php" style="text-decoration: none; font-family: sans-serif; ">Volver al inicio</a>'
    });
</script>
</body>
</html>