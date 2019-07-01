Inicio();
function Inicio(){
    document.querySelector('span.cargando').addEventListener('click', function(){
        console.log('Juan Esteban Villamizar es muy teso :)');
    });
    if(document.querySelector('form')){
        //console.log('Estoy en contactenos');
        document.querySelector('#enviar').addEventListener('click', validaciones);
    }else{
        //console.log('Estoy en inicio');

    }
}
function validaciones(e){
    //validar si algun campo se encuentra vacio
    var campo1 = document.querySelector('#nombre1').value;
    var campo2 = document.querySelector('#nombre2').value;
    var campo3 = document.querySelector('#apellido1').value;
    var campo4 = document.querySelector('#apellido2').value;
    var campo5 = document.querySelector('#telefono').value;
    var campo6 = document.querySelector('#correo').value;
    var campo7 = document.querySelector('#fechaNacimiento').value;
    var campo8 = document.querySelector('#mensaje').value;
    e.preventDefault(); 
    if(campo1 == "" || campo2 == "" || campo3 == "" || campo4 == "" || campo5 == "" || campo6 == "" || campo7 == "" || campo8 == ""){
        //console.log('llena todos los campos');
        Swal.fire({
            type: 'error',
            title: 'Error...',
            text: 'Diligencia el formulario correctamente'
          })
    }else{
        //console.log('todos los campos llenos');
        //hacer llamado a AJAX
        //se crea el objeto
        var xhr = new XMLHttpRequest();
        var datos = new FormData();
        datos.append('nombre1', campo1);
        datos.append('nombre2', campo2);
        datos.append('apellido1', campo3);
        datos.append('apellido2', campo4);
        datos.append('telefono', campo5);
        datos.append('correo', campo6);
        datos.append('mensaje', campo8);
        datos.append('fechaNacimiento', campo7);
        datos.append('status', '0');
        datos.append('accion', 'crear');
        //se establece la conexion
        xhr.open('POST', 'inc/modelos/modeloContacto.php', true);
        //leer respuesta
        xhr.onload = function(){
            if(this.status == 200 && this.readyState == 4){
                var respuesta = JSON.parse(xhr.responseText);
                //console.log(respuesta);
                //mostrar notificacion al usuario
                if(respuesta.respuesta == 'correcto'){
                    Swal.fire({
                        type: 'success',
                        title: 'SamaNaiku!!!',
                        text: 'Nos pondremos en contacto'
                    })
                    .then(resultado =>{
                        if(resultado.value){
                            window.location.href = 'index.php';
                        }
                    });
                }else{
                    Swal.fire({
                        type: 'error',
                        title: 'SamaNaiku!!!',
                        text: 'Tenemos un error con nuestra base de datos'
                    });
                }
            }else{
                Swal.fire({
                    type: 'error',
                    title: 'SamaNaiku!!!',
                    text: 'Tenemos un error'
                });
            }
        }
        //hacer peticion
        xhr.send(datos);
    }
}