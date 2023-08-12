<?php
 //Importando data base
     require __DIR__. "/../config/database.php";

     $db= conectarDB();

    //Consultar

    $query = "SELECT * FROM productos LIMIT {$limite}";

    $resultado= mysqli_query($db, $query);


    //OBtener el Resultado




?>

<div class="contenedor-anuncios">
            <?php while ($productos= mysqli_fetch_assoc($resultado)): {
                # code...
            }   ?>
                  <div class="anuncio">
              
                          <img loading="lazy"  src="/komotu/imagenes/<?php echo $productos["imagen"]; ?>.jpg" alt="anuncio">
           
                      <div class="contenido-anuncio">
                          <h3><?php echo $productos["titulo"]; ?></h3>
                          <p class="texto-limitado"><?php echo $productos["descripcion"]; ?> </p>
                          <div class="precio">$<?php echo $productos ["precio"]; ?></div>
                          
                          <a href="anuncio.php?id=<?php echo $productos ["id"] ?>" class="boton boton__negro">
                              Ver Articulo
                          </a>
                      </div>
                  </div> <!--Termina anuncio-->

                  <?php endwhile; ?>
          </div>



<?php

mysqli_close($db);
?>
