<html>
  <head>
    <title>PHP Test</title>
    <style>
      form{
        display:flex;
        flex-direction: column;
        max-width: 300px;
        margin: auto;
        padding: 12px;
      }
    </style>
  </head>
  <body>
    <form method="post" target="_blank">
      <label for="precio">Valor hora</label>
      <input name="precio" type="number" min="0" required />
      <label for="horas">Cantidad de horas</label>
      <input name="horas" type="number" min="0" required />
      <input type="submit" />
    </form>
    <?php
      function f($valor, $horas){
        $salario = $valor * $horas;
        echo "Salario: $salario";
      }
      $precio =  $_POST['precio'];
      $horas =  $_POST['horas'];
      f($precio, $horas);
?>
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>
