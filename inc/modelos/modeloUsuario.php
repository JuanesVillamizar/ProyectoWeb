<?php
if($_POST['accion']){
    $accion = $_POST['accion'];
    switch($accion){
        case 'login':
            try{
                include_once '../funciones/conexion.php';
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                // hashear passwords
                $opciones = array(
                    'cost' => 12
                );
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conn->prepare("SELECT usuario, id, password, nombres FROM usuarios WHERE usuario = ?");
                $stmt->bind_param('s', $usuario);
                $stmt->execute();
                // Loguear el usuario
                $stmt->bind_result($nombre_usuario, $id_usuario, $pass_usuario, $nombre);
                $stmt->fetch();
                if($nombre_usuario){
                    // El usuario existe, verificar el password
                    if(password_verify($password,$pass_usuario )){
                        // Iniciar la sesion
                        session_start();
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['nombre'] = $nombre;
                        $_SESSION['id'] = $id_usuario;
                        $_SESSION['login'] = true;
                        // Login correcto
                        $respuesta = array(
                            'respuesta' => 'correcto',
                            'nombre' => $nombre_usuario,
                            'tipo' => $accion
                        );
                    } else {
                        // Login incorrecto, enviar error
                        $respuesta = array(
                                'respuesta' => 'Password Incorrecto'
                        );
                    }

                } else {
                    $respuesta = array(
                        'respuesta' => 'Usuario no existe'
                    );
                }
            } catch(Exception $e) {
                // En caso de un error, tomar la exepcion
                $respuesta = array(
                    'error' => $e->getMessage()
                );
            }
            $stmt->close();
        break;
        case 'mostrar':
            try{
                include_once '../funciones/conexion.php';
                $query = 'SELECT * FROM `usuarios`';
                if($resultadoConsulta = $conn->query($query)){
                    $row = 0;
                    while ($fila = $resultadoConsulta->fetch_row()){
                        $informacionCompleta[$row][0] = $fila[1];
                        $informacionCompleta[$row][1] = $fila[3];
                        $row++;
                    }
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'informacion' => $informacionCompleta
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'Error, no se realizo la consulta SQL'
                    );
                }
            } catch(Exception $e) {
                // En caso de un error, tomar la exepcion
                $respuesta = array(
                    'error' => $e->getMessage()
                );
            }
        break;

        default:
            $respuesta = array(
                'respuesta' => 'Dato no existente'
            );
        break;
    }
    $conn->close();
} else {
    $respuesta = array(
        'respuesta' => 'No es posible acceder'
    );
}
echo json_encode($respuesta);