<?php

    require "includes/funciones.php";
    
    incluirTemplate("header", $inicio=false);
?>
          

            <main class="contenedor">
                <h1>Nuestro Blog</h1>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                         
                            <source srcset="build/img/blog1.webp" type="image/webp">
                            <source srcset="build/img/blog1.jpg" type="image/jpeg">
                             <img loading="lazy"  src="build/img/blog1.jpg" alt="Texto Entrada blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Todo lo que desees</h4>
                            <p>Escrito el <span>20/07/2023</span> por <span>Admin</span></p>

                            <p>
                                Consejos para realizar tu subliminados
                            </p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                         
                            <source srcset="build/img/blog2.webp" type="image/webp">
                            <source srcset="build/img/blog2.jpg" type="image/jpeg">
                             <img loading="lazy"  src="build/img/blog2.jpg" alt="Texto Entrada blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Guia de subliminacions</h4>
                            <p>Escrito el <span>20/07/2023</span> por <span>Admin</span></p>

                            <p>
                                Consejos para realizar tu subliminados
                            </p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                         
                            <source srcset="build/img/blog3.webp" type="image/webp">
                            <source srcset="build/img/blog3.jpg" type="image/jpeg">
                             <img loading="lazy"  src="build/img/blog3.jpg" alt="Texto Entrada blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Todo lo que desees</h4>
                            <p>Escrito el <span>20/07/2023</span> por <span>Admin</span></p>

                            <p>
                                Consejos para realizar tu subliminados
                            </p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                         
                            <source srcset="build/img/blog4.webp" type="image/webp">
                            <source srcset="build/img/blog4.jpg" type="image/jpeg">
                             <img loading="lazy"  src="build/img/blog4.jpg" alt="Texto Entrada blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Guia de subliminacions</h4>
                            <p>Escrito el <span>20/07/2023</span> por <span>Admin</span></p>

                            <p>
                                Consejos para realizar tu subliminados
                            </p>
                        </a>
                    </div>
                </article>
            </main>

            <?php
  
  incluirTemplate("footer");
?>