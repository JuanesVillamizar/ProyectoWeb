app();
validaciones();
mostrarMaestroPagina();
function app(){
    //login
    if(document.querySelector('input.boton')){
        //console.log('Login');
        document.querySelector('input.boton').addEventListener('click', validarLogin) 
    }
    //home
    if(document.querySelector('main.contenedor section')){
        //console.log('estas en el home');
        LlamadoCantidadAJAX(1);
        LlamadoCantidadAJAX(2);
        LlamadoCantidadAJAX(3);
        LlamadoCantidadAJAX(4);
        LlamadoCantidadAJAX(5);
    }
    //maestros
    if(document.querySelector('main.contenedor h3 span#cantMaestros')){
        LlamadoCantidadAJAX(3);
        mostrarMaestros(0);
        var contador = document.querySelectorAll('main.contenedor div div.card').length;
        //console.log(contador);
        var elemento = document.querySelector('#contenedorCartas');
        if(contador > 4){
            elemento.classList.remove('contenedor-cartas');
            elemento.classList.add('bloques');
        }else{
            elemento.classList.add('contenedor-cartas');
            elemento.classList.remove('bloques'); 
        }
    }
    //interesados
    if(document.querySelector('main.contenedor h3 span#cantInteresados')){
        //console.log('listo');
        LlamadoCantidadAJAX(4);
        mostrarInteresados();
        var icono = document.querySelectorAll('main.contenedor div.card-body span i');
        var contador;
        document.addEventListener('click',function(e){
            //console.log(e.target);
            //e.target.classList.contains('completar')
            var id = e.target.id.split(':');
            var status = e.target.parentElement.firstChild.value;
            cambiarEstado(e, id[1], status);
            contador = document.querySelectorAll('main.contenedor center div.contenedor-cartas div.card-body').length;
            console.log(contador);
        });
        /*var contador = document.querySelectorAll('main.contenedor center div.contenedor-cartas div.card-body').length;
        console.log(contador);
        var elemento = document.querySelector('#contenedorCartas');
        if(contador > 4){
            elemento.classList.remove('contenedor-cartas');
            elemento.classList.add('bloques');
        }else{
            elemento.classList.add('contenedor-cartas');
            elemento.classList.remove('bloques'); 
        }*/
        
    }
    //usuarios
    if(document.querySelector('main.contenedor h3 span#cantUsuarios')){
        //cantidad de usuarios
        LlamadoCantidadAJAX(6);
        //mostrar usuarios
        mostrarUsuarios();
    }
}
function validarLogin(e){
    e.preventDefault(); 
    //console.log('listo');
    var usuario = document.querySelector('input#usuario').value;
    var password = document.querySelector('input#password').value;
    var accion = document.querySelector('input#tipo').value;
    if(usuario == '' || password == ''){
        Swal.fire({
            type: 'error',
            title: 'Error...',
            text: 'Llene todos los campos'
        });
    }else{
        //console.log('campos llenos');
        //hacer llamado a AJAX
        //crear objeto
        var xhr = new XMLHttpRequest();
        var datos = new FormData();
        datos.append('usuario', usuario);
        datos.append('password', password);
        datos.append('accion', accion);
        //establecer conexion
        xhr.open('POST', 'inc/modelos/modeloUsuario.php', true);
        //leer la respuesta
        xhr.onload = function(){
            if(this.readyState == 4 && this.status == 200){
                let response = JSON.parse(xhr.responseText);
                //console.log(response);
                if(response.respuesta == 'correcto'){
                    swal({
                        title: 'Login Correcto',
                        text: 'Presiona OK para abrir el sistema',
                        type: 'success'
                    })
                    .then(resultado => {
                        if(resultado.value) {
                            window.location.href = 'home.php';
                        }
                    });
                }else if(response.respuesta == 'Usuario no existe'){
                    swal({
                        title: 'Hubo un error',
                        text: 'El usuario que se ingreso no existe',
                        type: 'error'
                    });
                }else if(response.respuesta == 'Password Incorrecto'){
                    swal({
                        title: 'Hubo un error',
                        text: 'La contraseña es incorrecta',
                        type: 'error'
                    });
                }
            }
        }
        //enviar la peticion
        xhr.send(datos);
    }
}
function validaciones(){
    if(document.querySelector('#session')){
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];

            var tipo = getString.split('=')[1];

            //console.log(getString);
            switch(tipo){
                case '1':
                        swal({
                            title: 'Sesion',
                            text: 'Cerraste la sesion correctamente.',
                            type: 'success'
                        });
                break;
                case '2':
                        swal({
                            title: 'Hubo un error',
                            text: 'Inicia sesion primero.',
                            type: 'error'
                        });
                break;
                default:
                    //console.log('Variable existe pero no tiene un valor numerico');
                    swal({
                        title: 'Hubo un error',
                        text: 'No alteres la URL.',
                        type: 'error'
                    });
                break;
            }
        }else{
            //console.log('No hay ninguna variables');
        }
    }else{
        //console.log('No existe o no se encontro el elemento especificado');
    }
}
function LlamadoCantidadAJAX(num){
    //hacer llamado a Ajax
    //crear el objeto
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('opcion', num);
    //establecer conexion
    xhr.open('POST', 'inc/modelos/modeloCantidad.php', true);
    //revizar respuesta
    xhr.onload = function(){
        if(this.status == 200 && this.readyState == 4){
            let response = JSON.parse(xhr.responseText);
            //console.log(response.opcion);
            if(response.respuesta == 'correcto'){
                switch(response.opcion){
                    case '1':
                        //console.log(response);
                        var contenedor = document.querySelector('#cantServicios');
                        contenedor.innerHTML = response.sumaTotal;
                        break;
                    case '2':
                        //console.log(response);
                        var contenedor = document.querySelector('#cantRegistrados');
                        contenedor.innerHTML = response.sumaTotal;
                        break;
                    case '3':
                        //console.log(response);
                        var contenedor = document.querySelector('#cantMaestros');
                        contenedor.innerHTML = response.sumaTotal;
                        break;
                    case '4':
                        //console.log(response);
                        var contenedor = document.querySelector('#cantInteresados');
                        contenedor.innerHTML = response.sumaTotal;
                        break;
                    case '5':
                        //console.log(response);
                        var contenedor = document.querySelector('#disponibles');
                        contenedor.innerHTML = response.sumaTotal;
                        break;
                    case '6':
                        //console.log(response);
                        var contenedor = document.querySelector('#cantUsuarios');
                        contenedor.innerHTML = response.sumaTotal;
                        break;
                    default:
                        console.log('Esta intentando hacer daños a la plataforma?');
                        break;
                }
            }else{
                console.log('ocurrio un error');
            }
        }
    }
    //enviar la peticion
    xhr.send(datos);
}
function mostrarInteresados(){
    //hacer llamado a ajax
    //crear el objeto
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('accion', 'mostrar');
    //establecer la conexion
    xhr.open('POST', 'inc/modelos/modeloContacto.php', true);
    //leer la respuesta
    xhr.onload =function(){
        if(this.status == 200 && this.readyState == 4){
            let response = JSON.parse(xhr.responseText);
            //console.log(response.informacion);
            if(response.respuesta == 'correcto'){
                var elementoPadre = document.querySelector('main.contenedor center div.contenedor-cartas');
                var status = '';
                for(var i = 0; i < response.informacion.length; i++){
                    //console.log('listo');
                    var elementoHijo = document.createElement('div');
                    elementoHijo.classList.add('card');
                    if(response.informacion[i][6] == '0'){
                        status = 'gris';
                    }else if(response.informacion[i][6] == '1'){
                        status = 'verde';
                    }
                    elementoHijo.innerHTML = 
                    `<div class="card-body">
                        <h1 class="card-title" name="pNombre"><i class="fas fa-star"></i>` + response.informacion[i][1] + `</h1>
                        <p class="card-text" name="pMensaje">` + response.informacion[i][3] + `</p>
                        <p class="card-text" name="pFechaInteres">` + response.informacion[i][5] + `</p>
                        <p class="card-text" name="pFechaNacimiento">` + response.informacion[i][4] + `</p>
                        <p class="card-text" name="pMetodosContacto">` + response.informacion[i][2] + `</p>
                        <span><input type="hidden" id="status" value="` + response.informacion[i][6] + `"><i id="id:` + response.informacion[i][0] + `" class="fas fa-user-check completar `+ status +`"></i></span>
                    </div>`;
                    elementoPadre.appendChild(elementoHijo);
                }
            }
        }
    }
    xhr.send(datos);
}
function mostrarMaestros(pagina){
    //hacer llamado a ajax
    //crear el objeto
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('accion', 'mostrar');
    //establecer la conexion
    xhr.open('POST', 'inc/modelos/modeloMaestros.php', true);
    //leer la respuesta
    xhr.onload = function(){
        if(this.status == 200 && this.readyState == 4){
            let response = JSON.parse(xhr.responseText);
            //console.log(response.informacion);
            if(response.respuesta == 'correcto'){
                var elementoPadre = document.querySelector('main.contenedor div');
                for(var i = 0; i < response.informacion.length; i++){
                    //console.log('listo');
                    var elementoHijo = document.createElement('div');
                    elementoHijo.classList.add('card');
                    var template = "";
                    if(pagina == 0){
                        template = `<div>
                                        <input type="hidden" name="id" id="idMaestro" value="` + response.informacion[i][0] + `">
                                        <img src="img/` + response.informacion[i][4] + `" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h1 class="card-title">` + response.informacion[i][2] + `</h1><br>
                                            <p class="card-text">` + response.informacion[i][3] + `</p>
                                            <a href="#" class="btn btn-outline-secondary">Editar</a>
                                        </div>
                                    </div>`;
                    }else if(pagina == 1){
                        template = `<div>
                                        <input type="hidden" name="id" id="idMaestro" value="` + response.informacion[i][0] + `">
                                        <img src="img/` + response.informacion[i][4] + `" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h1 class="card-title">` + response.informacion[i][2] + `</h1><br>
                                            <p class="card-text">` + response.informacion[i][3] + `</p>
                                        </div>
                                    </div>`;
                    }
                    elementoHijo.innerHTML = template;
                    elementoPadre.appendChild(elementoHijo);
                }
            }
        }
    }
    xhr.send(datos);
}
function mostrarUsuarios(){
    //hacer llamado a AJAX
    //hacer llamado a AJAX
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('accion', 'mostrar');
    //establecer la conexion
    xhr.open('POST', 'inc/modelos/modeloUsuario.php', true);
    //leer la respuesta
    xhr.onload = function(){
        if(this.status == 200 && this.readyState == 4){
            var response = JSON.parse(xhr.responseText);
            //console.log(response);
            if(response.informacion.length > 0){
                var contenedor = document.querySelector('main.contenedor div.contenedor-usuarios');
                for(var i = 0; i < response.informacion.length; i++){
                    //contenedores de usuarios 
                    
                        //campos de usuarios
                        
                }
            }
        }
    }
    //enviar datos
    xhr.send(datos);

}
function cambiarEstado(e, id, CampoStatus){
    //hacer llamado a AJAX
    //crear los datos
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('accion', 'editar');
    datos.append('status', CampoStatus);
    datos.append('id', id);
    //abrir la conexion
    xhr.open('POST','inc/modelos/modeloContacto.php', true);
    //leer la respuesta
    xhr.onload = function(){
        if(this.status == 200 ){
            var respuesta = JSON.parse(xhr.responseText);
            //console.log(respuesta.respuesta);
            if(respuesta.respuesta == 'correcto'){
                var status = respuesta.status;
                //console.log('listo');
                var color = '';
                if(status == 0){
                    color = 'gris';
                }else if(status == 1){
                    color = 'verde';
                }
                e.target.classList.remove('gris');
                e.target.classList.remove('verde');
                e.target.classList.add(color);
                e.target.parentElement.firstChild.value = status;
            }
        }
    }
    //enviar la peticion
    xhr.send(datos);
}

//pagina de maestros de la pagina donde todo el mundo puede verla
function mostrarMaestroPagina(){
    if(document.querySelector('main.servicios div.contenedor-servicios')){
        //console.log('listo');
        mostrarMaestros(1);
    }
}

