<?php

    require "includes/funciones.php";
    
    incluirTemplate("header", $inicio=false);
?>
          

            <main class="contenedor">
                <h1>Contacto</h1>

                <picture>
                    <source srcset="build/img/destacada3.jpg" type="image/jpeg">
                    <source srcset="build/img/destacada3.webp" type="image/webp">
                     <img loading="lazy"  src="build/img/destacada3.jpg" alt="Imagen Contacto">
                </picture>

                <h2>Llene el Formulario de Contacto</h2>
                <form action="" class="formulario">
                    <fieldset>
                        <legend>Informacion Personal</legend>
                        <label for="nombre"> Nombre</label>
                        <input type="text" placeholder="Tu nombre" id="nombre">
    
                        <label for="email"> Email</label>
                        <input type="email" placeholder="Tu Email" id="email">
    
                        <label for="tel"> Teléfono</label>
                        <input type="email" placeholder="Tu Teléfono" id="tel">
                        <label for="mensaje"> Mensaje</label>
                        <textarea name="" id="" cols="30" rows="10" id="mensaje"></textarea>
                    </fieldset>
    
                    <fieldset> 
                        <legend>Informacion Sobre Camiseta</legend>
                        <label for="opciones"> Vende o Compra</label>
                        <select name="" id="opciones">
                                <option value="" disabled selected> Seleccione</option>
                                <option value="compra">Compra</option>
                                <option value="vende">Vende</option>
                        </select>
                        <label for="presupuesto">Precio o Presupuesto</label>
                        <input type="number" placeholder="" id="presupuesto">
                    </fieldset>
    
                    
                    <fieldset> 
                        <legend>Contacto</legend>
                        <p>Como desea ser Contactado</p>
                        <div class="forma-contacto">
                            <label for="contactar-telefono">Teléfono</label>
                            <input name="contacto" type="radio" value="Telefono" id="contactar-telefono">
                            <label for="contactar-email">Email</label>
                            <input name="contacto" type="radio" value="Email" id="contactar-email">
                        </div>
    
                        <p>Si Eligio telefono, Elija Fecha y Hora</p>
                        <label for="fecha"> Fecha</label>
                        <input type="date" placeholder="Tu Teléfono" id="tel">
                        <label for="hora"> Hora</label>
                        <input type="time"  id="hora" min="09:00" max="18:00">
                        
                        </fieldset>
                        <input type="submit" value="Enviar" class="boton__negro">
                     
                </form>
    
      
            </main>
        

    

            <?php
  
  incluirTemplate("footer");
?>