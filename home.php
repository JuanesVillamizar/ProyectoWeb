<?php include_once 'inc/funciones/sesiones.php'; ?>
<?php include_once 'inc/template/header.php'; ?>
<?php include_once 'inc/template/appBarra.php'; ?>

<main class="contenedor">
    <section class="cantServicios">
        <h3>Servicios</h3>
        <p>La cantidad de servicios para ofrecer son: <span id="cantServicios"> </span>, para mas informacion click <a href="#">aqui...</a></p>
    </section>
    <section class="cantProductos">
        <h3>Tienda</h3>
        <p>La tienda tiene <span id="cantRegistrados"> </span> productos y la cantidad de esos productos disponibles para la venta son: <span id="disponibles"> </span>, para mas informacion click <a href="#">aqui...</a></p>
    </section>
    <section class="cantMaestros">
        <h3>Maestros</h3>
        <p>La cantidad de maestros disponibles son: <span id="cantMaestros"> </span>, para mas informacion click <a href="appNuestroEquipo.php">aqui...</a></p>
    </section>
    <section class="cantInteresados">
        <h3>Interesados</h3>
        <p>La cantidad de interesados son: <span id="cantInteresados"> </span>, para mas informacion click <a href="appInteresados.php">aqui...</a></p>
    </section>
</main>

<?php include_once 'inc/template/appFooter.php'; ?>