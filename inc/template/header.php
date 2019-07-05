<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'inc/funciones/funciones.php';
        $actual = obtenerPaginaActual();
        $pagina = '';
        switch($actual){
            case 'index':
            $pagina = 'Inicio';
            break;
            case 'contactenos':
            $pagina = 'Contactanos';
            break;
            case 'nuestroEquipo':
            $pagina = 'Nuestro Equipo';
            break;
            case 'login':
            $pagina = 'Iniciar sesion';
            break;
            case 'home':
            $pagina = 'Sistema de gestion de datos';
            break;
            case 'appNuestroEquipo':
            $pagina = 'Infromacion Maestros';
            break;
            case 'appInteresados':
            $pagina = 'Infromacion Interesados';
            break;
            case 'appGestionUsuarios':
            $pagina = 'Gestion de usuarios';
            break;
            default:
            $pagina = 'Pagina Inexistente';
            break;
        }
    ?>
    <meta charset="UTF-8">
    <meta name="Angeles" content="Web de angeles">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Quita propiedades por defecto-->
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <!--Tipo de fuente-->
    <link href="https://fonts.googleapis.com/css?family=KoHo:400,700" rel="stylesheet">
    <!--Pone los iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <!--Letra especial titulo-->
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title><?php echo $pagina; ?></title>
</head>

<body>