<?php 
    session_start();
    include_once 'inc/template/header.php'; 
    if(isset($_GET['session'])){
        $session = $_GET['session'];
        if($session == 1){
            $_SESSION = array();
        }
    }else{
        $session = 0;
    }
    if(isset($_SESSION['nombre'])){
        header('Location:home.php');
    }
?>
<div class="contenedor-formulario">
    <h1>SamaNaiku</h1>
    <form id="formulario" method="post">
        <div class="caja-login">
            <div class="form-group row">
                <label for="usuario" class="col-sm-2 col-form-label">Usuario:</label>
                <div class="col-sm-10">
                <input type="text" class="textoGrandre form-control" name="usuario" id="usuario" placeholder="Usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
                <div class="col-sm-10">
                <input type="password" class="textoGrandre form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="enviar">
                <input type="hidden" id="tipo" value="login">
                <input type="hidden" id="session" value="<?php echo $session; ?>">
                <input type="submit" class="boton" value="Iniciar Sesión">
            </div>
        </div>
    </form>
</div>
<?php include_once 'inc/template/appFooter.php'; ?>