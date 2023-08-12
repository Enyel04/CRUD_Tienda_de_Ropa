<?php
    //Base de datos
    require "../../includes/config/database.php";

   $db= conectarDB();

   //Consultar para obtener los vendedores y los tipos

   $consultaVendedores = "SELECT * FROM vendedores";
   $consultaTipos = "SELECT * FROM tipo";
   $resultadoConsultaTipos=mysqli_query($db, $consultaTipos);
   $resultadoConsultaVendedores=mysqli_query($db, $consultaVendedores);

   //Arreglo con mensajes de errores
   //Ejecutar el codigo despues de enviar el formulario

   $errores= [];

   $titulo = "";
   $precio = "";
   $descripcion = "";
   $tipoID ="";
   $vendedorID = "";    

   $creado = date("Y-m-d"); 



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
    if (!$imagen["name"] || $imagen["error"]) {
      $errores[]= "La imagen es Obligatoria";
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

        /** Subida de Archivos **/
        
        //Crear Carpeta

        $carpetaImagenes= "../../imagenes/";

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        //Generar un nombre Unico

        $nombreImagen= md5(uniqid(rand(), true));

        var_dump($nombreImagen);

        //subir la Imagen
        move_uploaded_file($imagen ["tmp_name"], $carpetaImagenes . $nombreImagen . ".jpg");




        $queryProductos = "INSERT INTO productos (titulo, precio, imagen, descripcion,creado, tipo_id) VALUES ('$titulo', '$precio','$nombreImagen' , '$descripcion','$creado', '$tipoID')";

        // Ejecutar la consulta para insertar el producto en la tabla productos
        $resultadoProductos = mysqli_query($db, $queryProductos);

        // Obtener el ID del producto insertado
        $productoId = mysqli_insert_id($db);

        // Insertar en la tabla vendedores_has_productos
        $queryVendedoresProductos = "INSERT INTO vendedores_has_productos (vendedores_id, productos_id) VALUES ('$vendedorID', '$productoId')";

        // Ejecutar la consulta para insertar la relación en la tabla vendedores_has_productos
        $resultadoVendedoresProductos = mysqli_query($db, $queryVendedoresProductos);

        if ($resultadoProductos && $resultadoVendedoresProductos) {
            //redireccionar el usuario

            header("Location: /komotu/admin?registrado=1");
        }
}
  
    

    
   }

    //funciones para llamar al header
    require "../../includes/funciones.php";
    
    incluirTemplate("header", $inicio=false);
?>


            <main class="contenedor">
                <h1>CREAR</h1>
            <a href="../" class="boton boton__negro-inline">Volver</a>

                <?php foreach($errores as $error):?>
                    <div class="alerta error">
                        <?php echo $error; ?>
                    </div>
                    
               
                <?php endforeach; ?>



            <form  class="formulario" method="POST" action="/komotu/admin/articulos/crear.php" enctype="multipart/form-data">
                <fieldset>
                    <legend>Informacion General</legend>

                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo Producto" value=" <?php echo $titulo; ?>" maxlength="40">

                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" placeholder="precio" name="precio" min="1" value="<?php echo $precio; ?>"   
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type = "number"
                        maxlength = "6" >

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

                    <label for="descripcion">descripcion:</label>
                    <textarea  id="descripcion" name="descripcion" maxlength="200" ><?php echo $descripcion; ?></textarea>
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
        
                <input type="submit" value="Crear Producto" class="boton boton__negro-inline">
            </form>

            </main>
            <?php
  incluirTemplate("footer");
?>