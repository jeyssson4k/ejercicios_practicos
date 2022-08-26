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
                    <tr>
                        <td>15</td>
                        <td>Usuario</td>
                        <td>Insert</td>
                        <td>Descripción</td>
                        <td>2022-06-18</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Usuario</td>
                        <td>Update</td>
                        <td>Descripción</td>
                        <td>2022-05-21</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Persona</td>
                        <td>Update</td>
                        <td>Descripción</td>
                        <td>2022-04-28</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Usuario</td>
                        <td>Delete</td>
                        <td>Descripción</td>
                        <td>2022-03-23</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Persona</td>
                        <td>Insert</td>
                        <td>Descripción</td>
                        <td>2022-02-21</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Persona</td>
                        <td>Delete</td>
                        <td>Descripción</td>
                        <td>2022-01-20</td>
                    </tr>
                </table>
            </section>
        </section>
    </main>
</body>
</html>