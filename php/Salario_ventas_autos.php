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
      <label for="cantidad">Cantidad de autos vendidos</label>
      <input name="cantidad" type="number" min="0" required />
      <label for="precios">Precio autos</label>
      <input name="precios" type="text" required placeholder="Precios separados por coma sin incluir puntos"/>
      <input type="submit" />
    </form>
    <?php
      function f($cantidad, $precios){
        $base = 1000;
        $comisiones = $cantidad * 150;
        $extra = 0;
        $autos = explode(",", $precios);
        $length = count($autos);
        for($i = 0; $i < $length; $i++){
          $extra += (intval($autos[$i])*0.05);
        }

        $salario = $base + $comisiones + $extra; 
        echo "Salario: $salario";
      }
      $cantidad =  $_POST['cantidad'];
      $precios =  $_POST['precios'];
      f($cantidad, $precios);
?>
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>
