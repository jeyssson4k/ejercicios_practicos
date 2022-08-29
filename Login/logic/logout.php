<?php     
    session_start();

    //adm database
    $server = 'DESKTOP-4027O50\PRUEBA3';
    $connectionInfo = ['Database' => 'login'];
    $connection = sqlsrv_connect($server, $connectionInfo);

    $user = $_SESSION["user"];
    $sql_insert = "INSERT INTO Log_Sesion VALUES('$user','Cierre de sesion',GETDATE())";
    $sql_execute = sqlsrv_query($connection, $sql_insert);

    session_destroy();
    unset($_POST);

    header("Location: http://localhost/Login/index.php");
    exit;
?>