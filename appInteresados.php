<?php include_once 'inc/funciones/sesiones.php'; ?>
<?php include_once 'inc/template/header.php'; ?>
<?php include_once 'inc/template/appBarra.php'; ?>
<?php
include_once 'inc/funciones/conexion.php';
$query = 'SELECT * FROM `interesados`';
?>

<main class="contenedor">
    
    <h3>La cantidad de interesados son: <span id="cantInteresados"> </span></h3>
    <center>
        <div class="contenedor-cartas" id="contenedorCartas">
            
        </div>
    </center>
</main>

<?php include_once 'inc/template/appFooter.php'; ?>
