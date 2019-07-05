<footer>
        <div class="contenedor-footer">
            <div class="nosotros">
                <h2>Sobre nosotros</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore distinctio, ullam consequatur
                    saepe odio vel eligendi optio quisquam omnis voluptatem ducimus aliquam, velit exercitationem
                    mollitia repellendus ipsa cum placeat sint.</p>
            </div>
            <p class="copyright">
                Todos los derechos reservados.&copy; <br>
                Desarrollado y diseñado por: <br> Juan Esteban Villamizar Sierra <a href="login.php"><span class="cargando"><i class="fas fa-spinner" title="Vuelve a intentarlo"></i></span></a>
            </p>
        </div>
    </footer>
</body>
<script src='js/sweetalert2.all.min.js'></script>
<script src='js/plugins.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
    switch($actual){
        case 'index':
            echo "<script src='js/main.js'></script>";
        break;
        case 'nuestroEquipo':
            echo "<script src='js/app.js'></script>";
        break;
        case 'contactenos':
            echo "<script src='js/main.js'></script>";
        break;
        case 'login':
            echo "<script src='js/app.js'></script>";
        break;
        case 'home':
            echo "<script src='js/app.js'></script>";
        break;
        default:
        break;
    }
?>
</html>