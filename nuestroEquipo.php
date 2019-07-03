<?php include_once('inc/template/header.php'); ?>
<?php include_once('inc/template/barra.php'); ?>
<?php include_once('inc/template/hero.php'); ?>
<?php
include_once 'inc/funciones/conexion.php';
$query = 'SELECT * FROM `maestros`';
?>
<main class="servicios contenedor">
    <h2>Nuestro Equipo</h2>
    <div class="contenedor-servicios">
        <?php
            if($resultadoConsulta = $conn->query($query)){
                while ($fila = $resultadoConsulta->fetch_row()):
            ?>
                    <div class="card">
                        <div class="servicio">
                            <img src="img/<?php echo $fila[5]; ?>" class="card-img-top iconos" alt="Imagen Maestro">
                            <div class="card-body">
                                <h1 class="card-title"><?php echo $fila[3]; ?></h1>
                                <p class="card-text"><?php echo $fila[4]; ?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                endwhile;
                $conn->close();
            }
        ?>
    </div>
</main>
<?php include_once('inc/template/footer.php'); ?>