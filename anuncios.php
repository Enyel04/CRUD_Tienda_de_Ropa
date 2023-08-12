<?php

    require "includes/funciones.php";
    
    incluirTemplate("header", $inicio=false);
?>

            <main class="contenedor">
     

                <section class="seccion contenedor">
                    <h2>Todo a tu gusto en venta</h2>
                    
                <?php

                    $limite= 10 ;

                    include "includes/templates/anuncios.php"
                ?>
                    
                    </div>
                    </section>
                
            </main>
 <?php
  
  incluirTemplate("footer");
?>