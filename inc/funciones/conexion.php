<?php
$conn = new mysqli('localhost', 'root', '', 'samanaiku');
//si el ping es 1 es verdadero y la conexion ya se establecio, si es 0 hay algun error
//echo '<pre>';
//echo $conn->ping();
//echo '</pre>';
//Si hay algun erroe que lo muestre con el if
if($conn->connect_error){
    echo $conn->connect_error;
}
//para que se vean las 'ñ' o tildes de lo que se trae de la base de datos 
$conn->set_charset('utf8');