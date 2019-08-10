<?php include_once('inc/template/header.php'); ?>
<?php include_once('inc/template/barra.php'); ?>
<?php include_once('inc/template/hero.php'); ?>
<main class="servicios contenedor">
    <form action="#" method="POST" id="contactenos">
        <fieldset>
            <legend>
                <h1>Contactanos</h1>
            </legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre1">Primer nombre: <span>*</span></label><br>
                    <input type="text" class="textoGrandre form-control" name="nombre1" id="nombre1" placeholder="Escribe Aqui..." required><br>
                </div>
                <div class="form-group col-md-6">
                    <label for="nombre2">Segundo nombre: </label><br>
                    <input type="text" class="textoGrandre form-control" name="nombre2" id="nombre2" placeholder="Escribe Aqui..." required><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="apellido1">Primer apellido: <span>*</span></label><br>
                    <input type="text" class="textoGrandre form-control" name="apellido1" id="apellido1" placeholder="Escribe Aqui..." required><br>
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido2">Segundo apellido: <span>*</span></label><br>
                    <input type="text" class="textoGrandre form-control" name="apellido2" id="apellido2" placeholder="Escribe Aqui..." required><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telefono">Telefono: <span>*</span></label><br>
                    <input type="text" class="textoGrandre form-control" name="telefono" id="telefono" placeholder="Escribe Aqui..." required><br>
                </div>
                <div class="form-group col-md-6">
                    <label for="correo">Correo: <span>*</span></label><br>
                    <input type="email" class="textoGrandre form-control" name="correo" id="correo" placeholder="Escribe Aqui..." required><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fechaNacimiento">Fecha de nacimiento: <span>*</span></label><br>
                    <input type="date" class="textoGrandre form-control" name="fechaNacimiento" id="fechaNacimiento" placeholder="Escribe Aqui..." required><br>
                </div>
                <div class="form-group col-md-6">
                    <label for="mensaje">Mensaje: <span>*</span></label><br>
                    <textarea class="textoGrandre form-control" name="mensaje" id="mensaje" placeholder="Escribe Aqui..." required></textarea><br>
                </div>
            </div>
            <center>
                <input type="submit" id="enviar" name="enviar" value="enviar" class="boton">
            </center>
        </fieldset>
    </form>

</main>
<?php include_once('inc/template/footer.php'); ?>
