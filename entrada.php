<?php

    require "includes/funciones.php";
    
    incluirTemplate("header", $inicio=false);
?>
          

            <main class="contenedor seccion contenido-centrado">
                <h1>Guia con lo que observes</h1>
              
                <picture>
                    <source srcset="build/img/destacada2.jpg" type="image/jpeg">
                    <source srcset="build/img/destacada2.webp" type="image/webp">
                     <img loading="lazy"  src="build/img/destacada2.jpg" alt="">
                </picture>
                <div class="Resumen-camiseta">
                    <p class="informacion__blog">Escrito el: <span>06/07/2023</span> por: <span>Angel Mendez</span></p>
                </div>

                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque pariatur asperiores odio aut nisi ducimus dicta minima libero? Eos sapiente optio laborum, quaerat eaque repudiandae totam animi ex at beatae.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi temporibus rerum ea iste labore illo, ratione a saepe autem nam eius praesentium sunt natus laudantium cum et magni ipsa tenetur.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero omnis rem sit? Iure recusandae quo, numquam possimus quasi optio corporis mollitia eum ipsum aut iste architecto! Eius voluptatum nemo nostrum!
                </p>
            </main>
    
<?php
  
  incluirTemplate("footer");
?>