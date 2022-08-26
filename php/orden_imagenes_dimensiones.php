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
      <label for="ancho">Ancho de las imágenes</label>
      <input name="ancho" type="text" required placeholder="Ancho separados por coma sin incluir puntos"/>
      <label for="alto">Alto de las imágenes</label>
      <input name="alto" type="text" required placeholder="Alto separados por coma sin incluir puntos"/>
      <input type="submit"/>
    </form>

    <?php 
     function f($ancho, $alto){
       $ancho_grupo = explode(",", $ancho);       
       $alto_grupo = explode(",", $alto);
       $cant_anchos = count($ancho_grupo);
       $cant_altos = count($alto_grupo);
       $dimensiones = [];
       $index = [];
       if($cant_anchos != $cant_altos){
         echo "Digite la misma cantidad de dimensiones..";
         return;
       }else{
         for($i = 0; $i < $cant_anchos; $i++){
           $e = intval($ancho_grupo[$i])* intval($alto_grupo[$i]);
           array_push($dimensiones, $e);
           $w = $ancho_grupo[$i];
           $h = $alto_grupo[$i];
           $index[$dimensiones[$i]] = " $w x $h <br />";
         }
         rsort($dimensiones);

         for($i = 0; $i < $cant_anchos; $i++){
           $e = $index[$dimensiones[$i]];
           echo "img$i = $e";
         }
       }
      }

      $ancho =  $_POST['ancho'];      
      $alto =  $_POST['alto'];
      f($ancho, $alto);
?>
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>
