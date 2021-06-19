<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Pellentesque aliquam diam mi, quis imperdiet lorem laoreet quis. Nam condimentum luctus velit, sed finibus quam vehicula eget. Pellentesque aliquam tincidunt lorem et varius. Aliquam id malesuada quam, sit amet accumsan eros. Nunc laoreet, mi eu malesuada lacinia, orci dui accumsan odio, fermentum pulvinar velit ex nec ipsum.</p>

                <p>Sed luctus faucibus mi ac accumsan. Suspendisse potenti. In vitae hendrerit risus. Pellentesque ultricies molestie mauris sollicitudin tristique. Mauris semper accumsan nunc, in ullamcorper ante rhoncus ac. Phasellus vel enim auctor, auctor nibh placerat, mattis risus. Integer sollicitudin libero augue, laoreet viverra purus efficitur id.</p>
            </div>
        </div>
    </main>
    
    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Nam vitae est vel risus luctus volutpat sed non tortor. Donec efficitur sapien non ligula sollicitudin, vitae ornare nibh dapibus. Etiam vel sapien porttitor, convallis nunc id, sodales ex.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>PRecio</h3>
                <p>Nam vitae est vel risus luctus volutpat sed non tortor. Donec efficitur sapien non ligula sollicitudin, vitae ornare nibh dapibus. Etiam vel sapien porttitor, convallis nunc id, sodales ex.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Nam vitae est vel risus luctus volutpat sed non tortor. Donec efficitur sapien non ligula sollicitudin, vitae ornare nibh dapibus. Etiam vel sapien porttitor, convallis nunc id, sodales ex.</p>
            </div>
        </div>
    </section>

<?php incluirTemplate('footer'); ?>