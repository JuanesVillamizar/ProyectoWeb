<?php
//echo json_encode($_POST);
if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
    try {
        include_once '../funciones/conexion.php';
        switch($opcion){
            case '1':
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `servicios_esenciales`");
            break;
            case '2':
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `producto`");
            break;
            case '3':
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `maestros`");
            break;
            case '4':
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `interesados`");
            break;
            case '5':
                $stmt = $conn->prepare("SELECT sum(cantidad) FROM `inventario_productos`");
            break;
            case '6':
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `usuarios`");
            break;
            default:
                $stmt = null;
            break;
        }
            $stmt->execute();
            $stmt->bind_result($cantidad);
            $stmt->fetch();
            $respuesta = array(
                'respuesta' => 'correcto',
                'sumaTotal' => $cantidad,
                'opcion' => $opcion
            );
            $stmt->close();
            $conn->close();
    }catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    echo json_encode($respuesta);
}

