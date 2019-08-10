<?php
//echo json_encode($_POST);
if(isset($_POST['correo'])){
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $status = $_POST['status'];
    setlocale(LC_ALL,"es_ES");
    $fechaActual = strftime('%A') . ' ' . strftime('%d') . ' de ' . strftime('%B') . ' del ' . strftime('%Y');
}
$accion = $_POST['accion'];

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
        case 'mostrar':
            try {
                // Realizar la consulta a la base de datos
                /*$stmt = $conn->prepare("SELECT * FROM interesados");
                $stmt->execute();
                //$stmt->bind_result($idContacto, $nombreContacto1, $nombreContacto2, $apellidoContacto1, $apellidoContacto2, $telefonoContacto, $correoContacto, $mensajeContacto, $FNContacto, $FAContacto, $status);
                $stmt->bind_result(
                    $info = array(
                        'id' => $idContacto,
                        'nombre1' => $nombreContacto1,
                        'nombre2' => $nombreContacto2,
                        'apellido1' => $apellidoContacto1,
                        'apellido2' => $apellidoContacto2,
                        'telefono' => $telefonoContacto,
                        'correo' => $correoContacto,
                        'mensaje' => $mensajeContacto,
                        'fechaNacimiento' => $FNContacto,
                        'fechaActual' => $FAContacto,
                        'status' => $status)
                        )
                );
                $stmt->fetch();
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'informacion' => $info
                );
                $stmt->close();
                $conn->close();
                */
                $query = 'SELECT * FROM `interesados`';
                if($resultadoConsulta = $conn->query($query)){
                    $row = 0;
                    while ($fila = $resultadoConsulta->fetch_row()){
                        $informacionCompleta[$row][0] = $fila[0];
                        $informacionCompleta[$row][1] = $fila[1] . ' ' . $fila[2] . ' ' . $fila[3] . ' ' . $fila[4];
                        $informacionCompleta[$row][2] = 'Telefono: ' . $fila[5] . ',<br> correo: ' . $fila[6];
                        $informacionCompleta[$row][3] = $fila[7];
                        $informacionCompleta[$row][4] = 'Fecha de nacimiento: '. $fila[8];
                        $informacionCompleta[$row][5] = $fila[9];
                        $informacionCompleta[$row][6] = $fila[10];
                        $row++;
                    }
                }
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'informacion' => $informacionCompleta
                );
            } catch(Exception $e) {
                // En caso de un error, tomar la exepcion
                $respuesta = array(
                    'error' => $e->getMessage()
                );
            }
        break;
        case 'editar':
            $status = $_POST['status'];
            $id = $_POST['id'];
            if($status == 0){
                $status = 1;
            }else if($status == 1){
                $status = 0;
            }
            try {
                // Realizar la consulta a la base de datos
                $stmt = $conn->prepare("UPDATE interesados SET interesados.status = ? WHERE id = ? ");
                $stmt->bind_param('ii', $status, $id);
                $stmt->execute();
                if($stmt->affected_rows > 0) {
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'status' => $status
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
        default:
            $respuesta = array('respuesta' => 'Error provocado al editar la pagina');
        break;
    }
echo json_encode($respuesta);