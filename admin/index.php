<?php





//importar la conexion
    require "../includes/config/database.php";
    $db= conectarDB();

    


//Escribir el Query
$query = "SELECT productos.*, tipo.nombre_tipo AS nombre_tipo FROM productos 
          INNER JOIN tipo ON productos.tipo_id = tipo.id";

//Consultar la BD
    $resultado_Query = mysqli_query($db, $query);

    //Muestra mensaje condicional

    $resultado= $_GET ["registrado"] ?? null;
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    
        if ($id) {
            // Eliminar las filas en vendedores_has_productos que corresponden al producto a eliminar
            $queryEliminarRelacion = "DELETE FROM vendedores_has_productos WHERE productos_id = {$id}";
            $resultadoEliminarRelacion = mysqli_query($db, $queryEliminarRelacion);
    
            if ($resultadoEliminarRelacion) {

                //Eliminar Archivo

                $query = "SELECT imagen FROM productos WHERE id= {$id}";

                $resultadoImagenQuery= mysqli_query($db,$query); 
                
                $producto= mysqli_fetch_assoc($resultadoImagenQuery);

                //Eliminamos la imagen y le agregamos la extension .jpg
                unlink("../imagenes/". $producto["imagen"].".jpg");


                // Luego de eliminar la relación, podemos eliminar el producto de la tabla productos
                $queryEliminarProducto = "DELETE FROM productos WHERE id = {$id}";
                $resultadoEliminarProducto = mysqli_query($db, $queryEliminarProducto);
    
                if ($resultadoEliminarProducto) {
                    // Redireccionar al usuario a la página de administración
                    header("Location: /komotu/admin?registrado=3");
                    exit;
              
                } else {
                    // Hubo un error al eliminar el producto
                    header("Location: /komotu/admin/?error=eliminar_producto");
                    exit;
                }
            } else {
                // Hubo un error al eliminar la relación en vendedores_has_productos
                header("Location: /komotu/admin/?error=eliminar_relacion");
                exit;
            }
        }
    }
    
    
    



    //Incluye un template
    require "../includes/funciones.php";
    incluirTemplate("header", $inicio=false);
?>
          

            <main class="contenedor">
                <h1>ADMIN de Tienda de Ropa</h1>

                <?php
                if ($resultado==1):   ?>
                    <p class="alerta exito">Anuncio Creado Correctamente</p>

                <?php elseif ($resultado==2):?>
                    <p class="alerta exito">Anuncio Actualizado Correctamente</p>

                <?php elseif ($resultado==3):?>
                    <p class="alerta exito">Anuncio Eliminado Correctamente</p>
                <?php endif;  ?>
      
                <a href="articulos/crear.php" class="boton boton__negro-inline">Nuevo Producto</a>

                <table class="propiedades">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                            
                        </tr>

                        <tbody> <!--Mostrar Resultados-->

                        <?php while ($productos= mysqli_fetch_assoc($resultado_Query)): ?>
                            <tr>
                                <td> <?php echo $productos["id"]?></td>
                                <td> <?php echo $productos["titulo"]?></td>
                                <td><img src="/komotu/imagenes/<?php echo $productos["imagen"];?>.jpg" alt="Imagen" class="imagen-tabla"></td>
                                <td>$<?php echo $productos["precio"]?></td>
                
                                <td><?php echo $productos["nombre_tipo"]?></td>
                                <td>

                                <form  method="POST" class="w-100">
                                            <!-- El botón submit enviará el formulario con los parámetros en la URL -->
                                            <input type="hidden" name="id" value="<?php echo $productos["id"]; ?>">
                                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                                        </form>
                            
                                    <a href="articulos/actualizar.php?id=<?php echo $productos["id"]?>" class="boton-amarillo-block">Actualizar</a>
                                    </td>   
                            </tr>

                            <?php endwhile; ?>

                        </tbody>
                    </thead>
           </table>
            </main>

      



            <?php
  //Cerrar la conexion

  incluirTemplate("footer");
?>