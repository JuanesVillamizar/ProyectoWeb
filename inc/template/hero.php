<?php 
    $texto = '';
    $boton = "<a href='contactenos.php' class='boton'>Contactar</a>";
    switch($actual){
        case 'index':
        $texto = 'Espacio para interactuar con el ser interior y profundizar en la armonia del alma.';
        break;
        case 'nuestroEquipo':
        $texto = 'Nuestro equipo de trabajo esta conformado por 3 grandes maestros.';
        break;
        case 'contactenos':
        $texto = 'Permitenos ponernos en contacto contigo.';
        $boton = "<a href='#contactenos' class='boton'>Comencemos</a>";
        break;
        default:
        $texto = 'ERROR NO EXISTE ESTA PAGINA';
        break;
    }
?>
<div class="hero">
    <div class="contenedor-hero">
        <h1 class="titulo letra-titulo">SamaNaikû</h1>
        <h1 class="letra-titulo">Descubriendo tu ser interior.</h1>
        <p><i class="fas fa-om mo"></i>  <i class="fas fa-quote-left pequeno"></i><?php echo $texto; ?><i class="fas fa-quote-right pequeno"></i></p>
        <?php echo $boton; ?>
    </div>
</div>
<div class="logo">
        <img src="img/logo.png" alt="Logo">
</div>