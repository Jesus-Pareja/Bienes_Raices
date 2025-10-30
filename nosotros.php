<?php

    require 'includes/funciones.php';

incluirTemplate('header'); 
?>
<main class="contenedor seccion">
    <h1>Conoce sobre nosotros</h1>

    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>
                25 años de Experiencia
            </blockquote>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Delectus, molestiae! Sit, rem culpa perferendis
                odit quasi dicta cumque aliquam eius dolores corrupti
                eos blanditiis veritatis magni saepe, praesentium repellat
                totam.Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Delectus, molestiae! Sit, rem culpa perferendis
                odit quasi dicta cumque aliquam eius dolores corrupti
                eos blanditiis veritatis magni saepe, praesentium repellat
                totam.
            </p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Delectus, molestiae! Sit, rem culpa perferendis
                odit quasi dicta cumque aliquam eius dolores corrupti
                eos blanditiis veritatis magni saepe, praesentium repellat
                totam.Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Delectus, molestiae! Sit, rem culpa perferendis
                odit quasi dicta cumque aliquam eius dolores corrupti
                eos blanditiis veritatis magni saepe, praesentium repellat
                totam.
            </p>
        </div>
    </div>
</main>

<section class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum numquam
                nobis adipisci, quas consectetur quisquam facere. Labore, mollitia culpa
                maiores id suscipit nobis debitis nemo ab laudantium corporis quasi eius?
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum numquam
                nobis adipisci, quas consectetur quisquam facere. Labore, mollitia culpa
                maiores id suscipit nobis debitis nemo ab laudantium corporis quasi eius?
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum numquam
                nobis adipisci, quas consectetur quisquam facere. Labore, mollitia culpa
                maiores id suscipit nobis debitis nemo ab laudantium corporis quasi eius?
            </p>
        </div>
    </div>

</section>

<?php incluirTemplate('footer');  ?>
