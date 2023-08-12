<?php


    $id =$_GET["id"];
    $id =filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("location: /komotu/");
    }

    // Importar la Conexion

    require "includes/config/database.php";
    $db= conectarDB();

    $query= "SELECT * FROM productos WHERE id={$id}";

    //Obtene Resultado
    $resultado= mysqli_query($db, $query);
    
    if (!$resultado->num_rows) {
       header("location: /komotu/");
    }

    $producto= mysqli_fetch_assoc($resultado);



    require "includes/funciones.php";
    incluirTemplate("header", $inicio=false);
?>
          

            <main class="contenedor seccion contenido-centrado">
                <h1><?php echo $producto["titulo"]; ?></h1>

                     <img loading="lazy"  src="imagenes/<?php echo $producto["imagen"]; ?>.jpg" alt="">
        
                <div class="Resumen-camiseta">
                    <p class="precio">
                    $<?php echo $producto["precio"]; 
                    ?>
                    </p>
                </div>

                <p>
                <?php echo $producto["descripcion"]; ?>
                </p>
            </main>
    

            <?php

            mysqli_close($db);
  
  incluirTemplate("footer");
?>