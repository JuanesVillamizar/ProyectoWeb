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
    <?php
    if($resultadoConsulta = $conn->query($query)){
        while ($fila = $resultadoConsulta->fetch_row()):
    ?>
            <div class="card">
                <img src="img/<?php echo $fila[5]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"><?php echo $fila[3]; ?></h1>
                    <p class="card-text"><?php echo $fila[4] ?></p>
                    <a href="#" class="btn btn-outline-warning">Editar</a>
                </div>
            </div>
        <?php 
        endwhile;
    }
    ?>
    </div>
</main>

<?php include_once 'inc/template/appFooter.php'; ?>