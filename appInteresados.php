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
            <?php
            if($resultadoConsulta = $conn->query($query)){
                while ($fila = $resultadoConsulta->fetch_row()):
            ?>
                    <div class="card" style="margin:10px auto;">
                        <div class="card-body">
                            <h1 class="card-title" name="pNombre"><i class="fas fa-star"></i> <?php echo $fila[1] . ' ' . $fila[2] . ' ' . $fila[3] . ' ' . $fila[4]; ?></h1>
                            <p class="card-text" name="pMensaje"><i class="fas fa-star"></i> <?php echo $fila[7] ?></p>
                            <p class="card-text" name="pFechaInteres"><i class="fas fa-star"></i> <?php echo 'Fecha de contacto del interesado con nosotros ' . $fila[9]; ?></p>
                            <p class="card-text" name="pFechaNacimiento"><i class="fas fa-star"></i> <?php echo 'Fecha de nacimiento del interesado ' . $fila[8]; ?></p>
                            <p class="card-text" name="pMetodosContacto"><i class="fas fa-star"></i> <?php echo 'Telefono: ' . $fila[5] . '<br>' . 'Correo: ' . $fila[6]; ?></p>
                            <span><i class="fas fa-user-check"></i></span>
                        </div>
                    </div>
                <?php 
                endwhile;
            }
            ?>
        </div>
    </center>
</main>

<?php include_once 'inc/template/appFooter.php'; ?>