var contador = 0;
var primero = false;
var lugarActualDB = $("lugar-usuario");
var lugardeOtroUsuario = $("lugar-otro-usuario");
var ubicacionGeneral = 0;
// datos de usuario actual
var lugarUsuarioActual = "";
var avatarUsuarioActual = "";
var estadoUsuarioActual = "";
// datos de otros usuarios
var lugarOtroUsuario = "";
var avatarOtroUsuario = "";
var estadoOtroUsuario = "";
// estado del usuario en lista



// window.addEventListener("load", function () {
// 	/*
// 	const loader = document.getElementById("loader");
// 	loader.classList.add("hidden");

// 	const body = document.querySelector("body");
// 	body.style.overflow = "visible";
// 	body.style.overflowX = "hidden";
// 	*/
// });
var listauser = document.getElementById("content");
var isOpen1 = false;
var isOpen2 = false;
var isOpen3 = false;
var isOpen4 = false;
var isOpen5 = false;
var profile = document.getElementById("profile");
var chatContainer = document.querySelector(".chat");
//var btnMapa = document.getElementById("button-mapa");
var mapaContainer = document.getElementById("mapa");
//var btnClose = document.querySelector('.btn-close');


function verMapa() {
	if (isOpen4) {
		//btnClose.style.display = "none";
		//btnMapa.style.display = "block";
		mapaContainer.classList.remove("mostrar");
		mapaContainer.style.pointerEvents = "auto";

	} else {
		//btnClose.style.display = "block";
		mapaContainer.style.pointerEvents = "auto";
		mapaContainer.classList.add("mostrar");
	}
	isOpen4 = !isOpen4;
	// console.log(ubicacionGeneral);
}

function abrirchat() {
	if (isOpen1) {
		listauser.style.display = "none";
	} else {
		chatContainer.style.display = "block";
		listauser.style.pointerEvents = "auto";
		profile.style.display = "block";
		listauser.style.display = "none";
		chatContainer.style.padding = "20px";
	}
	isOpen1 = !isOpen1;
}
//salir 
var salirIcon = document.getElementById("expanded");

function salir() {
	if (isOpen2) {
		salirIcon.classList.add("show");
	} else {
		salirIcon.classList.remove("show");
	}
	isOpen2 = !isOpen2;
}

function cerrarChat() {
	if (isOpen5) {
		chatContainer.style.display = "block"
	} else {

		chatContainer.style.display = "none";
	}
	isOpen5 = !isOpen5;
}

function verMensaje() {
	if (isOpen3) {
		chatContainer.style.display = "none";
		listauser.style.pointerEvents = "auto";
		listauser.style.display = "none";
	} else {
		listauser.style.display = "block";
		chatContainer.style.padding = "0px";
		profile.style.display = "none";
		listauser.style.pointerEvents = "auto";
	}
	isOpen3 = !isOpen3;

}

function ubicaMap(ubi) {
	switch (ubi) {
		case 0:
			ubicacionGeneral = 0;
			break;
		case 1:
			ubicacionGeneral = 1;
			break;
		case 2:
			ubicacionGeneral = 2;
			break;
		case 3:
			ubicacionGeneral = 3;
			break;
		case 4:
			ubicacionGeneral = 4;
			break;
		case 6:
			ubicacionGeneral = 6;
			break;
		case 11:
			ubicacionGeneral = 11;

			break;
		default:
			ubicacionGeneral = 0;
	}
	actualizarLugar(ubicacionGeneral);
	chance = false;
	verMapa();
	//salirIcon.classList.remove("show");
}
window.addEventListener("load", function () {
	const loader = document.getElementById("loader");
	const preloadBar = document.getElementById("preload-bar");
	const image = document.querySelector(".loader img");
	const mostrarP = document.getElementById("mostrar-porcentaje");
	const btnEnter = document.getElementById("btn-enter");


	var porcentaje = 0;

	/*
	const interval = setInterval(function () {

		if (btnEnter.style.display != "block") {

			porcentaje += 1;
			c = porcentaje + "%";
			mostrarP.innerHTML = porcentaje + "%";
			if (porcentaje >= 100) {
				clearInterval(interval);
				// btnEnter.style.display = "block";
				mostrarP.style.display = "none";
			}
		} else {
			mostrarP.innerHTML = 99 + "%";
			preloadBar.style.width = "none";
		}
	}, 1000);
	*/
});

function campus() {
	window.open('Kioskos/index.html', '_self');
}
isO = false

function cerarPre() {
	if (isO) {
		loader.style.display = "block";
		loader.style.pointerEvents = "auto";
	} else {
		loader.style.display = "none";
		loader.style.pointerEvents = "none";
		primero = true;

	}
	isO = !isO;
}
$(document).ready(function () {

	setInterval(function () {
		updateUserList();
		updateUnreadMessageCount();
		showTypingStatus();
		updateUserChat();
		updateUserList();
		actualizarLugar();
		//console.log(".");	
	}, 6000);
	/*
	setInterval(function(){
		//showTypingStatus();
		//updateUserChat();	
	//	console.log(".");	
	}, 1000);
	*/
	$(".messages").animate({
		scrollTop: $(document).height()
	}, "fast");
	$(document).on("click", '#profile-img', function (event) {
		$("#status-options").toggleClass("active");
	});
	// $(document).on("click", '.expand-button', function(event) { 	
	// 	$("#profile").toggleClass("expanded");
	// 	$("#contacts").toggleClass("expanded");
	// });	
	$(document).on("click", '#status-options ul li', function (event) {
		$("#profile-img").removeClass();
		$("#status-online").removeClass("active");
		$("#status-away").removeClass("active");
		$("#status-busy").removeClass("active");
		$("#status-offline").removeClass("active");
		$(this).addClass("active");
		if ($("#status-online").hasClass("active")) {
			$("#profile-img").addClass("online");
		} else if ($("#status-away").hasClass("active")) {
			$("#profile-img").addClass("away");
		} else if ($("#status-busy").hasClass("active")) {
			$("#profile-img").addClass("busy");
		} else if ($("#status-offline").hasClass("active")) {
			$("#profile-img").addClass("offline");
		} else {
			$("#profile-img").removeClass();
		};
		$("#status-options").removeClass("active");
	});
	$(document).on('click', '.contact', function () {
		$('.contact').removeClass('active');
		$(this).addClass('active');
		var to_user_id = $(this).data('touserid');
		showUserChat(to_user_id);
		$(".chatMessage").attr('id', 'chatMessage' + to_user_id);
		$(".chatButton").attr('id', 'chatButton' + to_user_id);
	});
	$(document).on("click", '.submit', function (event) {
		var to_user_id = $(this).attr('id');
		to_user_id = to_user_id.replace(/chatButton/g, "");
		sendMessage(to_user_id);
	});
	$(document).on('focus', '.message-input', function () {
		var is_type = 'yes';
		$.ajax({
			url: "chat_action.php",
			method: "POST",
			data: { is_type: is_type, action: 'update_typing_status' },
			success: function () {
			}
		});
	});
	$(document).on('blur', '.message-input', function () {
		var is_type = 'no';
		$.ajax({
			url: "chat_action.php",
			method: "POST",
			data: { is_type: is_type, action: 'update_typing_status' },
			success: function () {
			}
		});
	});

});
function updateUserList() {
	// estadoenLista=document.getElementById("personasEnLinea");

	$.ajax({
		url: "chat_action.php",
		method: "POST",
		dataType: "json",
		data: { action: 'update_user_list' },
		success: function (response) {
			// console.log(response);
			var obj = response.profileHTML;
			var to_user_id = $(this).attr('data-touserid');
			Object.keys(obj).forEach(function (key) {
				// update user online/offline status
				if ($("#" + obj[key].userid).length) {
					if (obj[key].online == 1 && !$("#status_" + obj[key].userid).hasClass('online')) {
						$("#status_" + obj[key].userid).addClass('online');
						// $(to_user_id + obj[key].userid).addClass('mostraLista').removeClass('ocultarLista');
					} else if (obj[key].online == 1) {
						$("#status_" + obj[key].userid).removeClass('online');
						// $(to_user_id + obj[key].userid).removeClass('mostraLista').addClass('ocultarLista');	
					}
				}
			});
		}, error: function (xhr, status, error) {

		}
	});
}


function sendMessage(to_user_id) {
	ubicacionGeneral;
	scrollToBottom();
	var message = $(".message-input input").val();
	$('.message-input input').val('');
	if ($.trim(message) == '') {
		return false;
	}
	var formData = new FormData();
	formData.append('to_user_id', to_user_id);
	formData.append('chat_message', message);
	formData.append('action', 'insert_chat');
	formData.append('lugar', ubicacionGeneral);
	$.ajax({
		url: "chat_action.php",
		method: "POST",
		data: formData,
		dataType: "json",
		contentType: false,
		processData: false,
		success: function (response) {
			var resp = $.parseJSON(response);
			$('#conversation').html(resp.conversation);
			$(".messages").animate({ scrollTop: $('.messages').height() }, "fast");
			scrollToBottom();
		}
	});

}

$('.message-input input').keypress(function (event) {
	if (event.which == 13) { // Verificar si la tecla presionada es "Enter"
		event.preventDefault(); // Evitar que se inserte un salto de línea en el campo de entrada

		// Llamar a la función sendMessage() para enviar el mensaje
		sendMessage();
		scrollToBottom();
		// console.log(lugarActualDB);
	}
});
function showUserChat(to_user_id) {
	scrollToBottom();
	$.ajax({
		url: "chat_action.php",
		method: "POST",
		data: { to_user_id: to_user_id, action: 'show_chat' },
		dataType: "json",
		success: function (response) {
			$('#userSection').html(response.userSection);
			$('#conversation').html(response.conversation);
			$('#unread_' + to_user_id).html('');
			$('#unread_' + to_user_id).addClass('unread');
		}
	});
}
// funcion de ver chat personal 
function verChatPersonal() {
	$.ajax({
		url: "chat_action.php",
		method: "POST",
		data: { to_user_id: to_user_id, action: 'ver_char_personal' },
		dataType: "json",
		success: function (response) {
			$('#userSection').html(response.userSection);
			$('#conversation').html(response.conversation);
			$('#unread_' + to_user_id).html('')
			$('#unread_' + to_user_id).addClass('unread');
		}
	})
}

var entraNuevo = "";
function updateUserChat() {
	$('li.contact.active').each(function () {
		var to_user_id = $(this).attr('data-touserid');
		$.ajax({
			url: "chat_action.php",
			method: "POST",
			data: { to_user_id: to_user_id, action: 'update_user_chat' },
			dataType: "json",
			success: function (response) {
				$('#conversation').html(response.conversation);
				if (entraNuevo != $('#conversation')[0].innerText && primero) {
					entraNuevo = $('#conversation')[0].innerText; //-----------------------------------
					var audio = document.getElementById("audio");
					audio.play();
					// console.log(response);
				}
				//primero=true;
				//console.log(primero);

			}
		});
	});
}
var entrada = "";
function updateUnreadMessageCount() {
	$('li.contact').each(function () {
		if (!$(this).hasClass('active')) {
			var to_user_id = $(this).attr('data-touserid');
			$.ajax({
				url: "chat_action.php",
				method: "POST",
				data: { to_user_id: to_user_id, action: 'update_unread_message' },
				dataType: "json",
				success: function (response) {
					if (entrada != $('#conversation')[0].scrollHeight) {
						// console.log($('#conversation')[0].scrollHeight);
						entrada = $('#conversation')[0].scrollHeight;
						scrollToBottom();
						// El mensaje que llega de otro usuario sucede acá
						// console.log("MENSAJE DE UPDATEUNREADMESSAGECOUNT");

					}
				}
			});
		}
	});
}
function showTypingStatus() {
	$('li.contact.active').each(function () {
		var to_user_id = $(this).attr('data-touserid');
		$.ajax({
			url: "chat_action.php",
			method: "POST",
			data: { to_user_id: to_user_id, action: 'show_typing_status' },
			dataType: "json",
			success: function (response) {
				$('#isTyping_' + to_user_id).html(response.message);

			}
		});
	});
}



// Capturar el evento de desplazamiento del scroll
function scrollToBottom() {
	var docChat = document.getElementById("conversation");
	docChat.scrollTop = docChat.scrollHeight;
}





// actualizar  lugar de ubicacion del usuario
function actualizarLugar(ubicacion) {
	if (ubicacion != undefined) {
		//   console.log(ubicacion);
		var formData = new FormData();
		formData.append('action', 'actualizar_lugar_usuario');
		formData.append('lugar', ubicacion);
		$.ajax({
			url: "chat_action.php",
			method: "POST",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (response) {
				//   console.log(response);
				//   Obtener el lugar que el response nos manda
				var lugarActualizado = response.lugar;
				//   console.log("Lugar actualizado:", lugarActualizado);
				$('#lugar-del-usuario').text(lugarActualizado);
			},
			error: function (xhr, status, error) {
				//   console.log(xhr.responseText);
				//   console.log(error);
			}
		});
	}
}

//   Detectar el estado del usuario 
function detectarEstadoUsuario() {

}