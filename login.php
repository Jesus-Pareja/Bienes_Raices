<?php
var_dump($_POST);

//Conectar Base de datos
require 'includes/config/database.php';

$db = conectarDB();

// Autenticar Usuario
$errores = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = 'El email es obligatorio o no es valido';
    }

    if (!$password) {
        $errores[] = 'La contraseña es obligatoria';
    }

    if (empty($errores)) {
        
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db, $query);

        if ( $resultado->num_rows ) {
            //Revisar Password
            $usuario = mysqli_fetch_assoc($resultado);

            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                //el Usuario está autenticado
                session_start();

                //Llenar arreglo Sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /admin');

            }else{

                $errores[] = 'La constraseña es incorrecta';

            }

        }else{
            $errores[] = "El usuario no existe";
        }

    }

}





//Inluir Header
require 'includes/funciones.php';
incluirTemplate('header');

?>
<main class="contenedor seccion contenido-centradoname=">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error): ?>

        <div class="alerta error">
            <?php echo $error;  ?>
        </div>

    <?php endforeach; ?>



    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu Password" id="password">

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate('footer');  ?>