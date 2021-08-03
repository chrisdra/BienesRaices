<?php

    require '../../includes/app.php';
    // require '../../includes/funciones.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    // if(!$auth) {
    //     header('Location: /');
    // }

    //Base de datos
    // require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();
    
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';
    $creado = date('Y/m/d');

    //Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        //Crea una nueva instancia
        $propiedad = new Propiedad($_POST);


        /** SUBIDA DE ARCHIVOS **/
        //Se traslada el codigo entre la linea 75 y 85 para una funcion mas rapida
        //Crear carpeta
        // $carpetaImagenes = '../../imagenes/';
        // if(!is_dir($carpetaImagenes)) {
        //     mkdir($carpetaImagenes);
        // }

        //Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        //Setear la imagen
        //Subir la imagen 2
        //Realiza un resize a la imagen con intervencion
        if($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        //Validar
        $errores = $propiedad->validar();
        
        //Revisar que el array de errores este vacio
        if(empty($errores)){
            
            //Esto fue remplazado por el "Guardar" de Propiedad.php
            // $titulo = mysqli_real_escape_string(  $db,  $_POST['titulo'] );
            // $precio = mysqli_real_escape_string(  $db,  $_POST['precio'] );
            // $descripcion = mysqli_real_escape_string(  $db,  $_POST['descripcion'] );
            // $habitaciones = mysqli_real_escape_string(  $db,  $_POST['habitaciones'] );
            // $wc = mysqli_real_escape_string(  $db,  $_POST['wc'] );
            // $estacionamiento = mysqli_real_escape_string(  $db,  $_POST['estacionamiento'] );
            // $vendedorId = mysqli_real_escape_string(  $db,  $_POST['vendedor'] );
            // $creado = date('Y/m/d');

            //Crear la carpeta para subir imagenes
            if(!is_dir(CARPETAS_IMAGENES)) {
                mkdir(CARPETAS_IMAGENES);
            }

            //Asignar files hacia una variable
            // $imagen = $_FILES['imagen'];

            /* Todo esto se encuentra en "Validar" de Propiedad.php
            if(!$titulo) { $errores[] = "Debes añadir un titulo"; }
            if(!$precio) { $errores[] = "El Precio es Obligatorio"; }
            if( strlen( $descripcion ) < 50) { $errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";}
            if(!$habitaciones) { $errores[] = "El numero de habitaciones es obligatorio"; }
            if(!$wc) { $errores[] = "El numero de Baños es obligatorio"; }
            if(!$estacionamiento) { $errores[] = "El numero de lugares de Estacionamieno es obligatorio"; }
            if(!$vendedorId) { $errores[] = "Elige un vendedor"; }
            if(!$imagen['name'] || $imagen['error']) { $errores[] = "La imagen es Obligatoria"; }
            // Validar por tamaño (100 Kb max.)
            $medida = 1000 * 100;
            if($imagen['size'] > $medida) { $errores[] = 'La Imagen es muy pesada'; }
            */

            //Subir la imagen 1
            // move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );

            //Guarda la imagen en el servidor
            $image->save($carpetaImagenes . $nombreImagen);

            //Guarda en la base de datos
            $resultado = $propiedad->guardar();

            //echo $query;
            // $resultado = mysqli_query($db, $query);

            //Mensaje de exito o de error
            if($resultado) {
                //Redireccionar al usuario
                header('Location: /admin?resultado=1');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedorId">
                    <option value="">-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                    <?php endwhile; ?>
                </select>

            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer'); 
?>