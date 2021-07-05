<?php 

    //Importar la conexion
    require 'includes/config/database.php';
    $db = conectarDB();

    //Crear un email y password
    $email = "correo@correo.com";
    $password = "123456";

    //Password encriptado
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    //Query para crer el usuario
    $query = " INSERT INTO usuarios (email, password) VALUES ( '${email}', '${passwordHash}'); ";

    // echo $query;

    //Agregarlo a la base de datos
    mysqli_query($db, $query);