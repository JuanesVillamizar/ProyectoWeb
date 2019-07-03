<?php include_once 'inc/funciones/sesiones.php'; ?>
<?php include_once 'inc/template/header.php'; ?>
<?php include_once 'inc/template/appBarra.php'; ?>
<?php
include_once 'inc/funciones/conexion.php';
$query = 'SELECT * FROM `maestros`';
?>

<main class="contenedor">
    
    <h3>La cantidad de maestros son: <span id="cantMaestros"> </span> <a class="btn btn-outline-success my-2 my-sm-0" href="#" style="margin:15px" title="Agregar otro maestro" >+</a> </h3>
    <div class="contenedor-cartas" id="contenedorCartas">
    
    </div>
</main>

<?php include_once 'inc/template/appFooter.php'; ?>