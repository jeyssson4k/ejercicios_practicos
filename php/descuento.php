<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>

    <form method="post" target="_blank">
      <label for="count"> Precio</label>
      <input name="count" type="number" min="0" required />
      <input type="submit" />
    </form>

    <?php 
     function f($precio){
        $pfinal = $precio * 0.65;
        echo "Precio inicial: $precio <br />";
        echo "Precio con descuento $pfinal";
      }

      $cantidad =  $_POST['count'];
      f($cantidad);
?>
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>