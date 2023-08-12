<?php


function conectarDB() :mysqli{

        $db = mysqli_connect("localhost", "root", "", "komotu_crud");

       
    if (!$db) {
       echo "No se pudo Conectar";
       exit;
    }
    return $db;
}
