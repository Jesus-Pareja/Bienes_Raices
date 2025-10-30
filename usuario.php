<?php 

    //Importar conexion a la base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    //Crear datos usuario
    $email = "correo@correo.com";
    $password = "123456";

    $passwordHach = password_hash($password, PASSWORD_BCRYPT);

    //Query agregar usuario
    $query= "INSERT into usuarios (email, password) VALUES ( '{$email}', '{$passwordHach}' ); ";

    echo $query;

    //Agregar a base de datos

    mysqli_query($db, $query);

?>