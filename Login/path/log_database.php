<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Dashboard | Aplicación login</title>
</head>
<?php 
session_start();
if(!$_SESSION['user']){
    header("Location: http://localhost/Login/index.php");
    exit;
}
?>
<body>
    <main>
        <aside class="menu">
            <div class="user-info">
                <img draggable="false" src="https://png.pngtree.com/png-clipart/20190116/ourmid/pngtree-yellow-cat-cute-cat-sprouting-cat-cat-illustration-png-image_403119.jpg" alt="">
                <div class="user-data">
                    <span>Usuario: <?php 
                    $user = $_SESSION['user'];
                    echo "$user"?></span>
                    <span>Nombre: <?php 
                    $name = $_SESSION['name'];
                    echo "$name";?></span>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="./dashboard.php">Log Sesión</a></li>
                    <li class="active"><a href="#">Log base de datos</a></li>
                    <li><a id="logout-btn" href="../logic/logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <aside class="block"></aside>
        <section class="container">
            <h2>Aplicación Log In</h2>
            <section class="data-container">
               <h3>LOGS BASE DE DATOS</h3>
                <table  class="table-container">
                    <tr>
                        <td><strong>N°</strong></td>
                        <td><strong>Tabla</strong></td>
                        <td><strong>Acción</strong></td>
                        <td><strong>Descripción</strong></td>
                        <td><strong>Fecha</strong></td>
                    </tr>
                    <?php 
                    $server = 'DESKTOP-4027O50\PRUEBA3';
                    $connectionInfo = ['Database' => 'login'];
                    $connection = sqlsrv_connect($server, $connectionInfo);
                    
                    $sql = "SELECT * FROM Log_database order by consecutivo desc";
                    $query = sqlsrv_query($connection, $sql);
                    $i = 1;
                    while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC) ) {
                        if($i == 20){
                            break;
                        }
                        echo "<tr>";
                        $index = 'consecutivo';
                        echo "<td>$row[$index]</td>";
                        $index = 'nombre_tabla';
                        echo "<td>$row[$index]</td>" ;
                        $index = 'accion';
                        echo "<td>$row[$index]</td>";                        
                        $index = 'descripcion';
                        echo "<td>$row[$index]</td>";
                        $fecha = $row['fecha']-> format('Y-m-d H:i:s');
                        echo "<td>$fecha</td></tr>";
                        $i += 1;
                    }
                ?>
                </table>
            </section>
        </section>
    </main>
</body>
</html>