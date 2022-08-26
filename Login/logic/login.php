<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Document</title>
</head>
<body>
<?php   
    //adm database
    $server = 'DESKTOP-4027O50\PRUEBA3';
    $connectionInfo = ['Database' => 'login'];
    $connection = sqlsrv_connect($server, $connectionInfo);

    //user inputs
    $email =  $_POST['email'];
    $pass =  $_POST['password'];      

    $sql = "SELECT P.correo, U.password FROM Persona P inner join Usuario U on P.identificacion = U.identificacion WHERE P.correo = '$email' AND U.password = '$pass'";
    $query = sqlsrv_query($connection, $sql);
    $response = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);

    if($response){
        session_start();
        $userInfoQuery = "SELECT P.nombre, U.usuario FROM Persona P inner join Usuario U on P.identificacion = U.identificacion WHERE P.correo = '$email' AND U.password = '$pass'";
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
    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import 'sweetalert2/src/sweetalert2.scss'
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href="http://localhost/Login/index.php">Volver al inicio</a>'
    });
    console.log('ASDASD')
</script>

<?php 
//header("Location: http://localhost/Login/index.php");
/*
$tsql = "SELECT * FROM Persona";
$query = sqlsrv_query($connection, $tsql);
while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC) ) {
    echo $row['identificacion'].", ".$row['nombre']."<br />";
}
href="./../index.php"
*/
?>
</body>
</html>