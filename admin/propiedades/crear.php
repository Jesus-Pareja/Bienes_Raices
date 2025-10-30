<?php
require '../../includes/funciones.php';

$auth = estaAutenticado();

if (!$auth) {
    header('location: /');
}

// Base de datos

require '../../includes/config/database.php';
$db = conectarDB();

//Consulta para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo para almacenar errores
$errores = [];


$titulo = '';
$precio =  '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //    echo "<pre>";
    //    var_dump($_POST);
    //    echo "</pre>";

     echo "<pre>";
     var_dump($_FILES);
     echo "</pre>";



    $titulo =  mysqli_real_escape_string($db, $_POST['titulo']);
    $precio =  mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =  mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones =  mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc =  mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento =  mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id =  mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //Asignar FILES a una variable

    $imagen = $_FILES['imagen'];

    //VALIDAR CAMPOS VACÍOS Y ERRORES

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "Debes añadir una descripción y debe ser mayor a 50 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "El número de habitaciones es obligatorio";
    }

    if (!$wc) {
        $errores[] = "El número de baños es obligatorio";
    }

    if (!$estacionamiento) {
        $errores[] = "El número de estacionamientos es obligatorio";
    }

    if (!$vendedores_id) {
        $errores[] = "Debes seleccionar un vendedor";
    }

    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "La Imagen es Obligatoria";
    }

    //Convertir Bytes a KB (1MB máximo)

    $medida = 1000 * 1000;

    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }


    //echo "<pre>";
    //var_dump($errores);
    //echo "</pre>";

    //exit;

    

    if (empty($errores)) {

        /**  Subida de archivos  **/

        //Crear Carpeta

        $CarpetaImagenes = '../../imagenes/';

        if (!is_dir($CarpetaImagenes)) {
            
            mkdir($CarpetaImagenes);
        }

        /* Dar nombre unico a la imagen */

        $NombreImagen = uniqid(rand()) . $imagen['name'];

        /* Subir Imagen */

        move_uploaded_file($imagen['tmp_name'], $CarpetaImagenes . $NombreImagen);


        //INSERTAR A BASE DE DATOS  ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id)
    VALUES ('$titulo', '$precio', '$NombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id')";

        //echo $query;

        // Conectar a base de datos para insertar los datos

        $resultado = mysqli_query($db, $query);

        if ($resultado) {

            //redireccionar al usuario
            header('location: /admin?resultado=1');
        }
    }
}


incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>


    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min=1 value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpg, image/png" name="imagen">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number"
                id="habitaciones"
                name="habitaciones"
                placeholder="Ej: 3"
                min=1 value="<?php echo $habitaciones ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min=1 value="<?php echo $wc ?>">

            <label for="estacionamientos">Estacionamientos:</label>
            <input type="number" id="estacionamientos" name="estacionamiento" placeholder="Ej: 3" min=1 value="<?php echo $estacionamiento ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option value="">--- Selecionar ---</option>

                <?php while ($vendedor = mysqli_fetch_assoc($resultado)): ?>

                    <option <?php echo $vendedor['id'] === $vendedores_id ? 'selected' : ''; ?> value="<?php echo $vendedor['id'] ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>

                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" class="boton boton-verde" value="Crear Propiedad">

    </form>

</main>

<?php incluirTemplate('footer');  ?>