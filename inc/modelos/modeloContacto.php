<?php
//echo json_encode($_POST);
$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$status = $_POST['status'];
$accion = $_POST['accion'];
setlocale(LC_ALL,"es_ES");
$fechaActual = strftime('%A') . ' ' . strftime('%d') . ' de ' . strftime('%B') . ' del ' . strftime('%Y');

    //echo json_encode($_POST);
    include_once '../funciones/conexion.php';
    switch($accion){
        case 'crear':
            try {
                // Realizar la consulta a la base de datos
                $stmt = $conn->prepare("INSERT INTO interesados (nombre1, nombre2, apellido1, apellido2, telefono, correo, mensaje, fechaNacimiento, fechaActual, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
                $stmt->bind_param('sssssssssi', $nombre1  , $nombre2, $apellido1, $apellido2, $telefono, $correo, $mensaje, $fechaNacimiento, $fechaActual, $status);
                $stmt->execute();
                if($stmt->affected_rows > 0) {
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'id_insertado' => $stmt->insert_id,
                        'tipo' => $accion
                    );
                }  else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
                $stmt->close();
                $conn->close();
            } catch(Exception $e) {
                // En caso de un error, tomar la exepcion
                $respuesta = array(
                    'error' => $e->getMessage()
                );
            }
        break;
        case 'editar':
        break;
        case 'borrar':
        break;
        default:
        echo json_encode(array('respuesta' => 'Error provocado al editar la pagina'));
        break;
    }
echo json_encode($respuesta);