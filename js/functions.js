console.log("hola desde las funciones")
console.log(typeof $);
var responseValue = $('#response_value');
var myAlert = tailwind.Alert.getInstance(document.querySelector("#myAlert"));

var noticia = document.getElementById("noticia");

//OBTENEMOS LOS ROLES DE ACUERDO A LAS SERIES SELECCIONADOS



// toggleIcon.onclick=()=>{
//     if(pwd.type== "password"){
//         pwd.type="text";
//         toggleIcon.classList.add("active")
//     }else{
//         pwd.type="password";
//         toggleIcon.classList.remove("active");
//     }
// }
function validarNumeros(cadena) {
    const expresionRegular = /^[0-9]+$/;
    return expresionRegular.test(cadena);
}
function isValidEmail(email) {
    // Expresión regular para validar el formato del correo electrónico
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
function crearCuenta() {
    responseValue = $('#response_value');
    const nombre = $("#nombre").val();
    const apellido = $("#apellido").val();
    const email_adress = $("#email_adress").val();
    const password_normal = $("#password_normal").val();
    const password_sec = $("#password_sec").val();
    const rol_usuario = $("#rol_usuario").val();
    console.log("el rol del usuario es ", rol_usuario);
    if (nombre.length <= 4) {
        responseValue.text('Ingrese un nombre válido');
        responseValue.addClass('error');
        return false;
    }
    if (apellido.length <= 4) {
        responseValue.text('Ingrese un apellido válido');
        responseValue.addClass('error');
        return false;
    }
    if (!isValidEmail(email_adress)) {
        responseValue.text('Ingrese un correo electrónico válido');
        responseValue.addClass('error');
        // responseValue.addClass('error');
        return false;
    }
    if (password_normal.length <= 6) {
        responseValue.text('La contraseña debe tener mas de 6 caracteres, intenta de nuevo');
        responseValue.addClass('error');
        return false;
    }
    if (password_normal !== password_sec) {
        console.log("Las contraseñas no coinciden");
        responseValue.text('Las contraseñas no coinciden');
        responseValue.addClass('error');
        return false;
    }
    const formData = new FormData();
    formData.append('action', 'crearcuenta');
    formData.append('nombre', nombre);
    formData.append('apellido', apellido);
    formData.append('email_adress', email_adress);
    formData.append('password_normal', password_normal);
    formData.append('password_sec', password_sec);
    formData.append('rol_usuario', rol_usuario);
    jQuery.ajax({
        data: formData,
        url: 'action.php',
        type: 'post',
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function () {
            responseValue.text('Loading ...');
            responseValue.addClass('loading');
        },
        success: function (res) {
            console.log(res);
            if (res.success == true) {
                console.log(res.message);
                responseValue.text(res.message);
                responseValue.addClass('succes');
                $("#nombre").val("");
                $("#apellido").val("");
                $("#email_adress").val("");
                $("#password_normal").val("");
                $("#password_sec").val("");
                $("#rol_usuario").val("");
                responseValue.addClass('succes');
                responseValue.text(res.message);
            } else {
                responseValue.text(res.message);
                responseValue.addClass('error');
                // Muestra un mensaje de error al usuario o toma medidas apropiadas
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText)
            console.log("XHR status: " + status);
            console.log("Error: " + error);
        }
    });
}

function cambiarLugar(id) {
    switch (id) {
        case 1:
            window.location.href = "./index"
            break;

        default:
            break;
    }
}

function actualizarDatos() {
    responseValue = $('#response_value');
    const nombre = $("#nombre_usuario").val();
    const apelleidos = $("#apellido_usuario").val();
    const email = $("#email_usuario").val();
    const telf = $("#telef_usuario").val();
    const metodo_pago = $("#meoto_pago").val();
    const enlace_pago = $("#enlace_pago").val();
    const enlace_telegram = $("#enlace_telegram").val();
    const genero = $("#genero_usuario").val();


    console.log("NOMBRE DE USUARIO: " + nombre);
    console.log("APELLIODO DE USUARIO: " + apelleidos);
    console.log("EMAIL DE USUARIO: " + email);
    console.log("TELF DE USUARIO: " + telf);
    console.log("METODO DE USUARIO: " + metodo_pago);
    console.log("ENLACE PAGO  DE USUARIO: " + enlace_pago);
    console.log("ENLACE TELEGRAM  DE USUARIO: " + enlace_telegram);
    console.log("GENERO  DE USUARIO: " + genero);
    console.log("------------------------------------------------")
    if (nombre.length <= 4) {
        responseValue.text('Ingrese un nombre válido');
        responseValue.addClass('error');
        return false;
    }
    if (apelleidos.length <= 4) {
        responseValue.text('Ingrese un apellido válido');
        responseValue.addClass('error');
        return false;
    }
    if (!isValidEmail(email)) {
        responseValue.text('Ingrese un correo electrónico válido');
        responseValue.addClass('error');
        // responseValue.addClass('error');
        return false;
    }
    if (telf.length < 9) {
        responseValue.text('Ingrese un teléfono válido');
        responseValue.addClass('error');
        // responseValue.addClass('error');
        return false;
    }
    if (metodo_pago === '0') {
        responseValue.text('Seleccione un método de pago válido');
        responseValue.addClass('error');
        // responseValue.addClass('error');
        return false;
    }
    if (enlace_pago.length <= 10) {
        responseValue.text('Ingrese un enlace de pago válido');
        responseValue.addClass('error');
        // responseValue.addClass('error');
        return false;
    }
    if (enlace_telegram.length <= 10) {
        responseValue.text('Ingrese un enlace de telegram válido');
        responseValue.addClass('error');
        // responseValue.addClass('error');
        return false;
    }
    if (genero == '0') {
        responseValue.text('Seleccione un género válido');
        responseValue.addClass('error');
        // responseValue.addClass('error');
        return false;
    }

    const formData = new FormData();
    formData.append('action', 'actualizardatos');
    formData.append('apellido', apelleidos);
    formData.append('nombre', nombre);
    formData.append('email', email);
    formData.append('telf', telf);
    formData.append('metodo_pago', metodo_pago);
    formData.append('enlace_pago', enlace_pago);
    formData.append('enlace_telegram', enlace_telegram);
    formData.append('genero', genero);
    jQuery.ajax({
        data: formData,
        url: 'action.php',
        type: 'post',
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function () {
            responseValue.text('Loading ...');
            responseValue.addClass('loading');
        },
        success: function (res) {
            console.log(res);
            if (res.succes == true) {
                console.log(res.message);
                responseValue.addClass('succes');
                responseValue.text(res.message);
                window.location.href = "dashboard";
            } else {
                responseValue.text(res.message);
                responseValue.addClass('error');
                // Muestra un mensaje de error al usuario o toma medidas apropiadas
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText)
            console.log("XHR status: " + status);
            console.log("Error: " + error);
        }
    });
}
function validarDatos(nombre, cantidad, mensaje) {
    if (nombre.length <= cantidad) {
        noticia.innerHTML = mensaje;
        myAlert.show();
        return false;
    }
    return true;
}
function validarCantidad(valores, mensaje) {
    console.log("entrara aacá ")
    if (valores.length > valores) { // Cambia '2' al número máximo de editores permitidos
        noticia.innerHTML = mensaje;
        myAlert.show();
        return false;
    } 
    return true;
}
function validarCapCantidad(valingresado, valpermitido, mensaje) {
    console.log("entrara aacá ");
    if (valpermitido.length > valingresado) {
        noticia.innerHTML = mensaje;
        myAlert.show();
        return false;
    }
    return true;
}

function nuevocapitulo() {

    const nombre_capitulo = document.getElementById("nombre_capitulo").value;
    const link_referencial = document.getElementById("link_referencial").value;
    const info_capitulo = document.getElementById("info_capitulo").value;
    const serie_seleccionado = document.getElementById("serie_seleccionado").value;
console.log("serie: " + serie_seleccionado);


    if (!validarDatos(nombre_capitulo, 4, "Ingrese un nombre de capítulo válido para continuar")) { return false; }
    if (!validarDatos(link_referencial, 4, "Ingrese un enlace referencial válido para continuar")) { return false; }
    if (!validarDatos(info_capitulo, 4, "Ingrese una información referencial válida para continuar")) { return false; }
    window.location.href=`completar_cap.php?nombre=${nombre_capitulo}&link_ref=${link_referencial}&info_cap=${info_capitulo}&serie=${serie_seleccionado}`;

}
function guardarCap() {
    const dropzone_2 = Dropzone.forElement('.dropzone_2');
    const numero_serie = document.getElementById("numero_serie").value;
    const nombre_cap = document.getElementById("nombre_cap").value;
    const link_ref = document.getElementById("link_ref").value;
    const info_cap = document.getElementById("info_cap").value;


    const extensionpdf = ['.pdf', '.doc', '.docx', '.zip', '.rar'];
    if (dropzone_2.files.length === 0) {
        noticia.innerHTML = 'Ingrese un archivo válido para continuar';
        myAlert.show();
        dropzone_2.removeAllFiles(); // Cambiar a dropzone_2.removeAllFiles();
        return false;
    }

    const fileName_2 = dropzone_2.files[0].name;
    const fileExtension_2 = fileName_2.split('.').pop().toLowerCase();

    if (!extensionpdf.includes(`.${fileExtension_2}`)) {
        noticia.innerHTML = 'El tipo de archivo no es válido. Los formatos permitidos son: PDF, Word, ZIP, RAR.';
        myAlert.show();
        dropzone_2.removeAllFiles(); // Cambiar a dropzone_2.removeAllFiles();
        return false;
    }

    // CANTIDAD DE EDITORES,ETC
    // ---------------------- FALTA VALIDAR QUE LA CANTIDAD O EL NUMERO SEA MENOR A 5
    const cantidad_editores = document.getElementById('cantidad_editores').value;
    const editores = document.getElementById("editores");
    const editoresVal = Array.from(editores.selectedOptions).map(option => option.value);

    const cantidad_traductores = document.getElementById("cantidad_traductores").value;
    const traductores = document.getElementById("traductores");
    const traductoresVal = Array.from(traductores.selectedOptions).map(option => option.value);

    const cantidad_limpieza = document.getElementById("cantidad_limpieza").value;
    const limpieza = document.getElementById("limpieza");
    const limpiezaVal = Array.from(limpieza.selectedOptions).map(option => option.value);

    const cantidad_rh = document.getElementById("cantidad_rh").value;
    const rawhunters = document.getElementById("rawhunters");
    const rhVal = Array.from(rawhunters.selectedOptions).map(option => option.value);

    const cantidad_correctores = document.getElementById("cantidad_correctores").value;
    const correctores = document.getElementById("correctores");
    const correctoresValue = Array.from(correctores.selectedOptions).map(option => option.value);

    const cantidad_desensurador = document.getElementById("cantidad_desensurador").value;
    const desensurador = document.getElementById("desensurador");
    const desensuradorVal = Array.from(desensurador.selectedOptions).map(option => option.value);
    if (!validarCapCantidad(cantidad_editores, editoresVal, `Solo puedes seleccionar ${cantidad_editores} Editores`)) { return false; }
    if (!validarCapCantidad(cantidad_traductores, traductoresVal, `Solo puedes seleccionar ${cantidad_traductores} Traductores`)) { return false; }
    if (!validarCapCantidad(cantidad_limpieza, limpiezaVal, `Solo puedes seleccionar ${cantidad_limpieza} Limpiadores`)) { return false; }
    if (!validarCapCantidad(cantidad_rh, rhVal, `Solo puedes seleccionar ${cantidad_rh} Raw Huneter`)) { return false; }
    if (!validarCapCantidad(cantidad_correctores, correctoresValue, `Solo puedes seleccionar ${cantidad_correctores} Correctores`)) { return false; }
    if (!validarCapCantidad(cantidad_desensurador, desensuradorVal, `Solo puedes seleccionar ${cantidad_desensurador} Dessensuradores`)) { return false; }
    const formData = new FormData();
    formData.append('action', 'insertarcapitulo');
    formData.append('nombre_capitulo', nombre_cap);
    formData.append('link_referencial', link_ref);
    formData.append('info_capitulo', info_cap);
    formData.append('cantidad_editores', cantidad_editores);
    formData.append('numero_serie', numero_serie)
    formData.append('editoresVal', editoresVal);
    formData.append('cantidad_traductores', cantidad_traductores);
    formData.append('traductoresVal', traductoresVal);
    formData.append('cantidad_limpieza', cantidad_limpieza);
    formData.append('limpiezaVal', limpiezaVal);
    formData.append('cantidad_rh', cantidad_rh);
    formData.append('rhVal', rhVal);
    formData.append('cantidad_correctores', cantidad_correctores);
    formData.append('correctoresValue', correctoresValue);
    formData.append('cantidad_desensurador', cantidad_desensurador);
    formData.append('desensuradorVal', desensuradorVal);
    if (dropzone_2.files.length > 0) {
        const uploadedFile = dropzone_2.files[0];
        formData.append('resouce', uploadedFile);
    }

    jQuery.ajax({
        data: formData,
        url: 'action.php',
        type: 'post',
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function () {
            noticia.innerHTML = 'Loading ...';
            noticia.classList.add("alert-success");
        },
        success: function (res) {
            console.log(res);
            if (res.success == true) {
                console.log(res.message);
                responseValue.addClass('succes');
                responseValue.text(res.message);
                window.location.href = "capitulos.php";
            } else {
                noticia.innerHTML = 'Errror!!! Intente de nuevo ...';

                // Muestra un mensaje de error al usuario o toma medidas apropiadas
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText)
            console.log("XHR status: " + status);
            console.log("Error: " + error);
        }
    });
}

function nuevaSerie() {
    // Verificar si se ha cargado algún archivo en la interfaz Dropzone
    const dropzone_1 = Dropzone.forElement(".dropzone_1");
    // CAMBIAR LIMITE
    const limite = 3;
    // CAMABIAR LIMITE
    const extensionimage = ['.png', '.jpg', '.jpeg', '.webp'];
    const nombre_manga = document.getElementById("nombre_manga").value;
    const link_referencial = document.getElementById("link_referencial").value;
    const informacion_serie = document.getElementById("informacion_serie").value;


    // Editores
    const presupuesto_editor = document.getElementById("presupuesto_editor").value;
    const eidtores_seleccionados = document.getElementById('editores');
    // traductor
    const presupuesto_traductor = document.getElementById("presupuesto_traductor").value;
    const traductores_seleccionados = document.getElementById('traductores');
    // limpiadores
    const presupuesto_limpieza = document.getElementById("presupuesto_limpieza").value;
    const limpieza_seleccionados = document.getElementById('limpiadores');
    // HR
    const presupuesto_rh = document.getElementById("presupuesto_rh").value;
    const raw_hunters_seleccionados = document.getElementById('raw_hunters');
    // HR
    const presupuesto_corrector = document.getElementById("presupuesto_corrector").value;
    const correctores_seleccionados = document.getElementById('correctores');
    // DESENSURADOR
    const presupuesto_desensurador = document.getElementById("presupuesto_desensurador").value;
    const desensurador_seleccionados = document.getElementById('desensurador');
    const fecha_salida = document.getElementById("fecha_salida").value;
    // Obtener los valores seleccionados
    const editoresValue = Array.from(eidtores_seleccionados.selectedOptions).map(option => option.value);
    const traductorValue = Array.from(traductores_seleccionados.selectedOptions).map(option => option.value);
    const limpiezaValue = Array.from(limpieza_seleccionados.selectedOptions).map(option => option.value);
    const rhValue = Array.from(raw_hunters_seleccionados.selectedOptions).map(option => option.value);
    const correctorValue = Array.from(correctores_seleccionados.selectedOptions).map(option => option.value);
    const desensuradorValue = Array.from(desensurador_seleccionados.selectedOptions).map(option => option.value);
    // Los valores seleccionados estarán en el array 'selectedValues'
    console.log("EDITORES: " + editoresValue);
    console.log("TRADUCTORES: " + traductorValue);
    console.log("LIMPIEZA: " + limpiezaValue);
    console.log("RAW HUNTER: " + rhValue);
    console.log("CORRECTOR: " + correctorValue);
    console.log("DESENSURADOR: " + desensuradorValue);
    // Verificar si se ha cargado un archivo
    if (dropzone_1.files.length === 0) {
        noticia.innerHTML = 'Ingrese una foto válida para continuar';
        myAlert.show();
        dropzone_1.removeAllFiles(); // Cambiar a dropzone_2.removeAllFiles();
        return false;
    }

    // Obtener el nombre del archivo cargado
    const fileName = dropzone_1.files[0].name;
    const fileExtension = fileName.split('.').pop().toLowerCase();
    console.log(fileName);
    // Verificar si la extensión es válida
    if (!extensionimage.includes(`.${fileExtension}`)) {
        noticia.innerHTML = 'El tipo de archivo no es válido. Los formatos permitidos son: PNG, JPG, JPEG, WEBP.';
        myAlert.show();
        dropzone_1.removeAllFiles(); // Cambiar a dropzone_2.removeAllFiles();
        return false;
    }
    if (!validarDatos(nombre_manga, 4, "Ingrese un nombre de serie válido para continuar")) { return false; }

    if (!validarDatos(link_referencial, 4, "Ingrese un link referencial válido para continuar")) { return false; }

    if (!validarDatos(informacion_serie, 4, "Ingrese una información referencial válido para continuar")) { return false; }

    if (!validarDatos(presupuesto_editor, 0, "Ingrese un presupuesto válido para los Editores")) { return false; }

    if (!validarCantidad(editoresValue, `Solo puedes ingresar ${limite} Editor `)) { return false; }

    if (!validarDatos(presupuesto_traductor, 0, "Ingrese un presupuesto válido para los Traductores")) { return false; }

    if (!validarCantidad(traductorValue, `Solo puedes ingresar ${limite} Tradcutor`)) { return false; }

    if (!validarDatos(presupuesto_limpieza, 0, "Ingrese un presupuesto válido para los de Limpieza")) { return false; }

    if (!validarCantidad(limpiezaValue, `Solo puedes ingresar ${limite} Limpieza `)) { return false; }

    if (!validarDatos(presupuesto_rh, 0, "Ingrese un presupuesto válido para los Raw Hunter")) { return false; }

    if (!validarCantidad(rhValue, `Solo puedes ingresar ${limite} Raw Hunter `)) { return false; }

    if (!validarDatos(presupuesto_corrector, 0, "Ingrese un presupuesto válido para los Correctores")) { return false; }

    if (!validarCantidad(correctorValue, `Solo puedes ingresar ${limite} Corrector `)) { return false; }

    if (!validarDatos(presupuesto_desensurador, 0, "Ingrese un presupuesto válido para los Desensuradores")) { return false; }
    if (!validarCantidad(desensuradorValue, `Solo puedes ingresar ${limite} Raw Hunter `)) { return false; }
    const formData = new FormData();
    formData.append('action', 'insertarSerie');
    formData.append('nombre_serie', nombre_manga);
    formData.append('link_referencial', link_referencial);
    formData.append('info_serie', informacion_serie);
    formData.append('presupuesto_editor', presupuesto_editor);
    formData.append('editores', editoresValue);
    formData.append('presupuesto_traductor', presupuesto_traductor);
    formData.append('traductores', traductorValue);
    formData.append('presupuesto_limpieza', presupuesto_limpieza);
    formData.append('limpieza', limpiezaValue);
    formData.append('presupuesto_rh', presupuesto_rh);
    formData.append('rh', rhValue);
    formData.append('presupuesto_corrector', presupuesto_corrector);
    formData.append('corrector', correctorValue);
    formData.append('presupuesto_desensurador', presupuesto_desensurador);
    formData.append('desensurador', desensuradorValue);
    formData.append('fecha_salida', fecha_salida)
    if (dropzone_1.files.length > 0) {
        const uploadedFile = dropzone_1.files[0];
        formData.append('image_serie', uploadedFile);
    }
    jQuery.ajax({
        data: formData,
        url: 'action.php',
        type: 'post',
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function () {
            noticia.innerHTML = 'Loading ...';
            noticia.classList.add("alert-success");
        },
        success: function (res) {
            console.log(res);
            if (res.success == true) {
                console.log(res.message);
                responseValue.addClass('succes');
                responseValue.text(res.message);
                window.location.href = "serie";
            } else {
                noticia.innerHTML = 'Errror!!! Intente de nuevo ...';

                // Muestra un mensaje de error al usuario o toma medidas apropiadas
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText)
            console.log("XHR status: " + status);
            console.log("Error: " + error);
        }
    });
}

