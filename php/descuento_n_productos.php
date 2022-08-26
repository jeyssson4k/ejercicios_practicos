<html>
  <head>
    <title>PHP Test</title>
    <style>
      form{
        display: flex;
        flex-direction: column;
        width: 300px;
      }
    </style>
  </head>
  <body>

    <form method="post" target="_blank">
      <label for="precios"> Precio</label>
      <input name="precios" type="text" required placeholder="Precios separados por coma sin incluir puntos"/>
      <input type="submit" />
    </form>

    <?php 
     function f($precios){
       $productos = explode(",", $precios);
       $length = count($productos);
       for($i = 0; $i < $length ; $i++){
         $dcto = intval($productos[$i]) * 0.65;
          echo "Precio inicial: $productos[$i] ---- ";
          echo "Precio con descuento $dcto <br />";  
       }
      }

      $precios =  $_POST['precios'];
      f($precios);
?>
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>
