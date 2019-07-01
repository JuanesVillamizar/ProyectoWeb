<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">
    <img src="img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="home.php">Inicio <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Servicios esenciales</a>
      <a class="nav-item nav-link" href="#">Tienda</a>
      <a class="nav-item nav-link" href="appNuestroEquipo.php">Nuestro equipo</a>
      <a class="nav-item nav-link" href="appInteresados.php">Contacto clientes</a>
    </div>
  </div>
  <?php 
  if($_SESSION['usuario'] == 'Admin'):?>
    <a class="btn btn-outline-dark my-2 my-sm-0" href="#" style="margin:5px" >Administrar Usuarios</a>
  <?php endif;?>
  <a class="btn btn-outline-dark my-2 my-sm-0" href="login.php?session=1" >Salir</a>
</nav>