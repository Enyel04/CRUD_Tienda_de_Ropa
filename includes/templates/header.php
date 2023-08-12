<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komotu Web</title>

    <link rel="stylesheet" href="/komotu/build/css/app.css">
 
</head>
<body>
    <header class="header "> 
        
        <div class="contenedor contenido-header">
            <div class="barra">
               <a href="/komotu">
                    <img src="/komotu/build/img/logo.svg" alt="Logo">
                </a>

            <div class="mobile-menu">
                <img src="/komotu/build/img/barras.svg" alt="Icono Menu" id="icono_barra" class="icono_barra">
            </div>
            <div class="derecha">
                <img class="dark-mode-boton" src="/komotu/build/img/dark-mode.svg" alt="Boton Dark Mode">
                <nav class="navegacion"> 
                    <a href="/komotu/nosotros.php">Nosotros</a> 
                    <a href="/komotu/anuncios.php">Anuncios</a>
                    <a href="/komotu/blog.php">Blog</a>
                    <a href="/komotu/contacto.php">Contacto</a>
     
                 </nav>
            </div>
       
            </div> <!--.Barra-->
        </div>
        <?php if ($inicio) {?>
   
        <div class="header__imagen" >
            <picture>
                <source srcset="/komotu/build/img/header.webp" type="image/webp">
                 <img loading="lazy" src="/komotu/build/img/header.jpg" alt="Fondo">
            </picture>
            <h1> Venta de Camisetas y Tazas</h1>
        </div>

        <?php } ?>

     
    </header>