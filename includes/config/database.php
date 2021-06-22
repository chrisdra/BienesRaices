<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'bienes_raices');

    //Validando coneccion
    // if($db) {
    //     echo "Se conecto";
    // } else {
    //     echo "No se conecto";
    // } 
    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}