<?php
$accion = $_POST['accion'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

try {
    // hashear passwords
    $opciones = array(
        'cost' => 12
    );
    $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);

    include_once '../funciones/conexion.php';
    switch($accion){
        case 'login':
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

        break;

        default:
        break;
    }
    // Realizar la consulta a la base de datos
    
    $stmt->close();
    $conn->close();
} catch(Exception $e) {
    // En caso de un error, tomar la exepcion
    $respuesta = array(
        'error' => $e->getMessage()
    );
}
echo json_encode($respuesta);