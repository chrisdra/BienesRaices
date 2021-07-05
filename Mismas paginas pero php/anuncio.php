<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }

    //Importar la conexion
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

    //Consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    //Obtener resultado
    $resultado = mysqli_query($db, $query);


    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3.000.000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="habitaciones">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat arcu nec eros egestas, a luctus est consequat. Maecenas tempus orci turpis, eu elementum sapien laoreet eget. Vivamus ultricies ipsum sit amet mi sollicitudin, luctus faucibus quam imperdiet. Integer consectetur viverra nisl, sit amet efficitur enim blandit semper. Morbi iaculis lorem turpis, quis aliquet risus efficitur nec. Phasellus porttitor in diam id posuere. Fusce felis mauris, elementum tincidunt nisl eu, ultricies ullamcorper magna. Nam rutrum fringilla volutpat. Praesent vitae iaculis neque. Praesent scelerisque augue et pharetra aliquam. Nullam id purus eu lorem tempus tempus.</p>

            <p>Nam nulla elit, ultrices quis lacinia dictum, porta a mi. Proin et auctor orci. Vivamus a lobortis ipsum. Cras eget lacus eget ex vehicula gravida eget vel nisl. Nullam laoreet viverra nisi non bibendum. Phasellus lacus ipsum, bibendum a posuere sed, placerat eget odio. Maecenas ultrices sit amet risus quis aliquam. Donec posuere auctor fringilla. Aliquam sollicitudin consequat finibus.</p>
        </div>
    </main>

<?php 
    incluirTemplate('footer'); 
?>