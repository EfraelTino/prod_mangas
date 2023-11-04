<?php
session_start();
header('Content-Type: application/json');
include('Chat.php');
$inigami = new Chat();
if ($_POST['action'] == 'update_user_list') {
	$chatUsers = $chat->chatUsers($_SESSION['userid']);
	$data = array(
		"profileHTML" => $chatUsers,
	);
	echo json_encode($data);
}
if ($_POST['action'] == 'insert_chat') {

	$chat->insertChat($_POST['to_user_id'], $_SESSION['userid'], $_POST['chat_message'], $_POST['lugar']);
	echo json_encode($data);
}
if ($_POST['action'] == 'show_chat') {
	$chat->showUserChat($_SESSION['userid'], $_POST['to_user_id']);
	echo json_encode($data);
}
// ver chat personal
if ($_POST['action'] == 'ver_char_personal') {
	$chat->verChatPeronal($_SESSION['userid'], $_POST['to_user_id']);
	echo json_encode($data);
}
if ($_POST['action'] == 'update_user_chat') {
	$conversation = $chat->getUserChat($_SESSION['userid'], $_POST['to_user_id']);
	$lugarUsuario = "";
	$tipoAvatar = "";
	$estadoUsuario = "";
	$data = array(
		"conversation" => $conversation,
		// "lugarUsuario" => $lugarUsuario,
		// "tipoAvatar" => $tipoAvatar,
		// "estadoUsuario" => $estadoUsuario,
	);
	echo json_encode($data);
}
if ($_POST['action'] == 'update_unread_message') {
	$count = $chat->getUnreadMessageCount($_POST['to_user_id'], $_SESSION['userid']);
	$data = array(
		"count" => $count,
	);
	echo json_encode($data);
}

if ($_POST['action'] == 'update_typing_status') {
	$chat->updateTypingStatus($_POST["is_type"], $_SESSION["login_details_id"]);
	echo json_encode($data);
}
if ($_POST['action'] == 'show_typing_status') {
	$message = $chat->fetchIsTypeStatus($_POST['to_user_id']);
	$data = array(
		"message" => $message
	);
	echo json_encode($data);
}

// actualizar la ubicación del usuario en DB
if ($_POST['action'] == 'actualizar_lugar_usuario') {
	$lugar = $chat->actualizarLugarUsuario($_POST['lugar'], $_SESSION['userid']);

	// Crear un array con el estado actualizado
	$response = array(
		"lugar" => $lugar
	);

	// Convertir el array en JSON
	$jsonResponse = json_encode($response);

	// Enviar la respuesta al front-end
	echo $jsonResponse;
}
// Crear nuevo usuario 
if ($_POST['action'] == 'crearcuenta') {
	$crear_cuenta = $inigami->crearCuenta($_POST['nombre'], $_POST['apellido'], $_POST['email_adress'], $_POST['password_normal'], $_POST['password_sec'], $_POST['rol_usuario']);

	$response = array("message" => $crear_cuenta);
}
if ($_POST['action'] == 'actualizardatos') {
	$actualziar = $inigami->actualizarDatosUsuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telf'], $_POST['metodo_pago'], $_POST['enlace_pago'], $_POST['enlace_telegram'], $_POST['genero'], $_SESSION['userid']);
	$response = array(
		"succes" => true,
		"message" => $actualziar
	);
	$jsonResponse = json_encode($response);
	echo $jsonResponse;
}
if (isset($_POST['action']) && $_POST['action'] == 'insertarSerie') {
	$nombre_serie = $_POST['nombre_serie'];
	$link_referencial = $_POST['link_referencial'];
	$info_serie = $_POST['info_serie'];
	$presupuesto_editor = $_POST['presupuesto_editor'];
	$editores = $_POST['editores'];
	$presupuesto_traductor = $_POST['presupuesto_traductor'];
	$traductores = $_POST['traductores'];
	$presupuesto_limpieza = $_POST['presupuesto_limpieza'];
	$limpieza = $_POST['limpieza'];
	$presupuesto_rh = $_POST['presupuesto_rh'];
	$rh = $_POST['rh'];
	$presupuesto_corrector = $_POST['presupuesto_corrector'];
	$corrector = $_POST['corrector'];
	$presupuesto_desensurador = $_POST['presupuesto_desensurador'];
	$desensurador = $_POST['desensurador'];
	$fecha_salida = $_POST['fecha_salida'];

	if (isset($_FILES['image_serie'])) {
		$uploadedFile = $_FILES['image_serie'];
		$fileName = $uploadedFile['name'];
		$fileTmpName = $uploadedFile['tmp_name'];
		$fileSize = $uploadedFile['size'];
		$fileType = $uploadedFile['type'];
		$allowedExtensions  = ['jpg', 'jpeg', 'png', 'webp'];

		if ($allowedExtensions) {
			$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
			if (in_array($fileExtension, $allowedExtensions)) {
				$destination = "./serie_image/" . $fileName; // Corregido el nombre de la variable
				move_uploaded_file($fileTmpName, $destination);
				$response = array();
				// Llama a la función para insertar la serie
				$insetarSerie = $inigami->insertarSerie($fileName, $nombre_serie, $link_referencial, $info_serie, $presupuesto_editor, $editores, $presupuesto_traductor, $traductores, $presupuesto_limpieza, $limpieza, $presupuesto_rh, $rh, $presupuesto_corrector, $corrector, $presupuesto_desensurador, $desensurador, $fecha_salida);
				$response = $insetarSerie;
			} else {
				$response['success'] = false;
				$response['message'] = 'Invalid file extension';
			}
		} else {
		
		}
	} else {
		// Si no se envía un archivo, proporciona un mensaje de error
		$response = array(
			"success" => false,
			"message" => "No se ha enviado un archivo."
		);
	}

	// Convierte la respuesta en formato JSON
	$jsonResponse = $response;

	// Envía la respuesta al frontend
	echo $jsonResponse;
}

// $response = json_encode(array(
// 	'IMAGEN' => $imagen,
// 	'NOMBRE_SERIE' => $nombre_serie,
// 	'LINK_REFERENCIAL' => $link_referencial,
// 	'INFO_SERIE' => $info_serie,
// 	'PRESUPUESTO_EDITOR' => $presupuesto_editor,
// 	'EDITORES' => $editores,
// 	'PRESUPUESTO_TRADUCTOR' => $presupuesto_traductor,
// 	'TRADUCTORES' => $traductores,
// 	'PRESUPUESTO_LIMPIEZA' => $presupuesto_limpieza,
// 	'LIMPIEZA' => $limpieza,
// 	'PRESUPUESTO_RH' => $presupuesto_rh,
// 	'RH' => $rh,
// 	'PRESUPUESTO_CORRECTOR' => $presupuesto_corrector,
// 	'CORRECTOR' => $corrector,
// 	'PRESUPUESTO_DESENSURADOR' => $presupuesto_desensurador,
// 	'DESENSURADOR' => $desensurador
// ));
// }
if (isset($_POST['action']) && $_POST['action'] == 'insertarcapitulo') {
	$nombre_capitulo = $_POST['nombre_capitulo'];
	$link_referencial = $_POST['link_referencial'];
	$info_capitulo = $_POST['info_capitulo'];
	$numero_serie= $_POST['numero_serie'];
	$cantidad_editores = $_POST['cantidad_editores'];
	$editoresVal = $_POST['editoresVal'];
	$cantidad_traductores = $_POST['cantidad_traductores'];
	$traductoresVal = $_POST['traductoresVal'];
	$cantidad_limpieza = $_POST['cantidad_limpieza'];
	$limpiezaVal = $_POST['limpiezaVal'];
	$cantidad_rh = $_POST['cantidad_rh'];
	$rhVal = $_POST['rhVal'];
	$cantidad_correctores = $_POST['cantidad_correctores'];
	$correctoresValue = $_POST['correctoresValue'];
	$cantidad_desensurador = $_POST['cantidad_desensurador'];
	$desensuradorVal = $_POST['desensuradorVal'];
	if (isset($_FILES['resouce'])) {
		$filecargado = $_FILES['resouce'];
		$nameFile = $filecargado['name'];
		$tempfilename =  $filecargado['tmp_name'];
		$filetamanio = $filecargado['size'];
		$filetio = $filecargado['type'];
		$permitidos = ['pdf', 'doc', 'docx', 'zip', 'rar'];
		if ($permitidos) {
			$extension = strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));
			if(in_array($extension, $permitidos)){
				$destino = './capitulos/' . $nameFile;
				move_uploaded_file($tempfilename, $destino);
				$response= array();	
				// insertarCap(nombre_cap, link, info, serie, archivo, cantidad_editores, editores, cantidad_Traductores, traductores, cantidad_limpieza, limpieza, cantidad_rh, rh, cantidad_corrector, correctores, cantidad_desensurador, desensurador);
				$insertarCap = $inigami-> insertarCap($nombre_capitulo, $link_referencial, $info_capitulo,$numero_serie, $nameFile, $cantidad_editores, $editoresVal, $cantidad_traductores, $traductoresVal, $cantidad_limpieza, $limpiezaVal, $cantidad_rh, $rhVal, $cantidad_correctores, $correctoresValue, $cantidad_desensurador, $desensuradorVal);
				$response = $insertarCap;
			}else{
				$response['success'] = false;
				$response['message'] = 'Invalid file extension';
			}
		} else {
			$response['success'] = false;
			$response['message'] = 'Archivo no permitido';
		}
	} else {
		// Si no se envía un archivo, proporciona un mensaje de error
		$response = array(
			"success" => false,
			"message" => "No se ha enviado un archivo."
		);
	}
}
