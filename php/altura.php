<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>

    <form method="post" target="_blank">
      <label for="count">Altura</label>
      <input name="count" type="number" min="0" max="25" required />
      <input type="submit" />
    </form>

    <?php 
      function f($index){
        $n = "*";
        for($i = 1; $i <= $index; $i++){
            echo "$n <br />";
            $n .= "*";
        }
      }

      $cantidad =  $_POST['count'];
      f($cantidad);
?>
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>