<?php

    require "includes/funciones.php";
    
    incluirTemplate("header", $inicio=false);
?>

    <main class="contenedor seccion">
        <h1>Nosotros</h1>
        <div class="nosotros">
            <div class="contenido-nosotros">
                
                <picture>
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <img loading="lazy"  src="build/img/blog3.jpg" alt="">
                   
                </picture>
                <h3>5 Años de Experiencia   <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci, deserunt dolorem! Eveniet quo reprehenderit at placeat nihil, quod molestiae cumque, doloribus aliquam odio voluptatum impedit iusto, autem architecto sapiente. Tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit quas deserunt distinctio soluta at laboriosam, sunt illum sed dolorum numquam nam possimus corrupti ducimus sint, odit cumque sapiente commodi hic.</p></h3>
              
            
            </div>
         
      </div>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore similique quo fugit quae amet debitis veritatis numquam voluptates assumenda maxime! Natus, expedita libero? Ab libero aspernatur eligendi impedit magnam ratione!</p>

            </div> <!--termina icono-->

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Económico</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore similique quo fugit quae amet debitis veritatis numquam voluptates assumenda maxime! Natus, expedita libero? Ab libero aspernatur eligendi impedit magnam ratione!</p>
                
            </div><!--termina icono-->

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Rápido</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore similique quo fugit quae amet debitis veritatis numquam voluptates assumenda maxime! Natus, expedita libero? Ab libero aspernatur eligendi impedit magnam ratione!</p>
                
            </div> <!--termina icono-->

        </div>
    </main>
          

      
    <?php
  
  incluirTemplate("footer");
?>