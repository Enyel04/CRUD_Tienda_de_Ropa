<?php


    $id= $_GET["id"];

    $id= filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){

        header("Location: /komotu/admin");
    }

   
    //Base de datos
    require "../../includes/config/database.php";

   $db= conectarDB();

   //Obtener los datos del producto

   $consultaproducto = "SELECT p.id, p.titulo, p.precio, p.imagen, p.descripcion, p.creado, p.tipo_id, vh.vendedores_id 
   FROM productos p
   INNER JOIN vendedores_has_productos vh ON p.id = vh.productos_id
   WHERE p.id = {$id}";

$resultadoConsultaproducto = mysqli_query($db, $consultaproducto);


   //Consultar para obtener los vendedores y los tipos

   $consultaVendedores = "SELECT * FROM vendedores";
   $consultaTipos = "SELECT * FROM tipo";
   $resultadoConsultaTipos=mysqli_query($db, $consultaTipos);
   $resultadoConsultaVendedores=mysqli_query($db, $consultaVendedores);

   //Arreglo con mensajes de errores
   //Ejecutar el codigo despues de enviar el formulario

   $errores= [];

   if (!$resultadoConsultaproducto || mysqli_num_rows($resultadoConsultaproducto) === 0) {
    // El artículo no se encontró, puedes redirigir a una página de error o mostrar un mensaje
}

$producto = mysqli_fetch_assoc($resultadoConsultaproducto);

$titulo = $producto["titulo"];
$precio = $producto["precio"];
$descripcion = $producto["descripcion"];
$tipoID = $producto["tipo_id"];
$vendedorID = $producto["vendedores_id"];

$creado = date("Y-m-d"); 

$imagenproducto= $producto["imagen"];



   if ($_SERVER["REQUEST_METHOD"]=== "POST") {
    
   
/*
    echo " <pre>";
    var_dump($_POST);
    echo "</pre>";



    echo " <pre>";
    var_dump($_FILES);
    echo "</pre>";

*/
  
    $titulo =  mysqli_real_escape_string( $db, $_POST["titulo"]); 
    $precio = mysqli_real_escape_string($db, $_POST["precio"])  ;
    $descripcion = mysqli_real_escape_string( $db, $_POST["descripcion"])  ;
    $tipoID = mysqli_real_escape_string($db, $_POST["tipo"])  ;
    $vendedorID = mysqli_real_escape_string($db, $_POST["vendedor"]) ;

    //Asignar File en una variable

    $imagen = $_FILES ["imagen"];



    if (!$titulo) {
       $errores[]= "Debes añadir un titulo";
    }

    if (!$precio) {
        $errores[]= "El precio es Obligatorio";
    }

    if (!$descripcion) {
        $errores[]= "La descripcion es Obligatorio";
    }
    if (!$tipoID) {
        $errores[]= "Escoge el tipo";
    }
    if (!$vendedorID) {
        $errores[]= "Escoge el vendedor";
    }

    //Validar Tamaño por 1mb maximo

    $medida = 1000* 1000;

    if ($imagen["size"]> $medida) {
       $errores[]= "la imagen es muy pesada";
    }


  /* echo " <pre>";
    var_dump($errores);
    echo "</pre>";
    */

    // Revisar que no hayan errores

    if (empty($errores)) {


           //Eliminar imagen Previa

           $carpetaImagenes= "../../imagenes/";

        if (!is_dir($carpetaImagenes)) {
               mkdir($carpetaImagenes);
           }

        $nombreImagen= "";
        /** Subida de Archivos **/

        if ($imagen["name"]) {
            echo "Si hay una nueva imagen";

            unlink($carpetaImagenes . $producto["imagen"].".jpg");

                   //Generar un nombre Unico
            $nombreImagen= md5(uniqid(rand(), true). "jpg");

      
            //subir la Imagen
            move_uploaded_file($imagen ["tmp_name"], $carpetaImagenes . $nombreImagen . ".jpg");
        }else{
            $nombreImagen= $producto["imagen"];
        }


       // Actualizar los datos del producto en la tabla productos
      // Actualizar los datos del producto en la tabla productos
      $queryActualizarProducto = "UPDATE productos SET titulo='{$titulo}', precio={$precio}, imagen= '{$nombreImagen}', descripcion='{$descripcion}', tipo_id={$tipoID} WHERE id={$id}";

      // Ejecutar la consulta para actualizar los datos del producto en la tabla productos
      $resultadoActualizarProducto = mysqli_query($db, $queryActualizarProducto);

      // Actualizar la relación vendedores_has_productos
      $queryActualizarVendedor = "UPDATE vendedores_has_productos SET vendedores_id={$vendedorID} WHERE productos_id={$id}";

      // Ejecutar la consulta para actualizar la relación vendedores_has_productos
      $resultadoActualizarVendedor = mysqli_query($db, $queryActualizarVendedor);


      
        if ($resultadoActualizarProducto && $resultadoActualizarVendedor) {
            // Redireccionar el usuario
            header("Location: /komotu/admin?registrado=2");
        }
}
  
    

    
   }

    //funciones para llamar al header
    require "../../includes/funciones.php";
    
    incluirTemplate("header", $inicio=false);
?>


            <main class="contenedor">
                <h1>Actualizar</h1>
            <a href="../" class="boton boton__negro-inline">Volver</a>

                <?php foreach($errores as $error):?>
                    <div class="alerta error">
                        <?php echo $error; ?>
                    </div>
                    
               
                <?php endforeach; ?>



            <form  class="formulario" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Informacion General</legend>

                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo producto" value=" <?php echo $titulo; ?>" maxlength="40">

                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" placeholder="precio" name="precio" min="1" value="<?php echo $precio; ?>"  
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type = "number"
                        maxlength = "6"  >

                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo">
                        <option value="">Seleccione</option>
                    <?php while ($tipo=mysqli_fetch_assoc($resultadoConsultaTipos)): ?>
                            <option  <?php echo $tipoID===$tipo["id"] ? "selected" : ""; ?>
                            value="<?php echo $tipo["id"]; ?>"><?php echo $tipo["nombre_tipo"] = ucwords($tipo["nombre_tipo"]);
                            //El ucwords es para hacer en capitalize los datos, colocarlos en mayusculas automaticamente ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                    <img src="/komotu/imagenes/<?php echo $imagenproducto; ?>.jpg" class="imagen-small" alt="">

                    <label for="descripcion">descripcion:</label>
                    <textarea  id="descripcion" name="descripcion"  maxlength="200"><?php echo $descripcion; ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Vendedor</legend>
                <select name="vendedor">
                    <option value="">Seleccione</option>

                    <?php while ($vendedor=mysqli_fetch_assoc($resultadoConsultaVendedores)): ?>
                            <option  <?php echo $vendedorID===$vendedor["id"] ? "selected" : ""; ?>
                            value="<?php echo $vendedor["id"];?>">
                            <?php echo $vendedor["nombre"]. " " . $vendedor["apellido"]; ?>
                            
                        </option>

                    <?php endwhile; ?>
                </select>
                </fieldset>
        
                <input type="submit" value="Actualizar producto" class="boton boton__negro-inline">
            </form>

            </main>
            <?php
  incluirTemplate("footer");
?>