<?php
class Chat
{

	//DATABASE CONNECTION LOCALHOST
	private $host  = "localhost";
	private $user  = 'root';
	private $password   = "";
	private $database  = "inigmai";

	//DATA BASE CONNECTION SERVER
	//  private $host  = 'localhost';
	//  private $password   = "Cocorilow.1";
	//  private $user  = 'u960900126_saproducciones';
	//  private $database  = "u960900126_hondabd";


	private $chatTable = 'chat';
	private $chatUsersTable = 'users';
	private $chatLoginDetailsTable = 'chat_login_details';

	public $dbConnect;
	public function __construct()
	{
		$this->dbConnect = new mysqli($this->host, $this->user, $this->password, $this->database);
		if ($this->dbConnect->connect_error) {
			die("Error failed to connect to MySQL: " . $this->dbConnect->connect_error);
		}
	}
	public function getDBConnect()
	{
		return $this->dbConnect;
	}
	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$data = array();
		/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}
	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($username, $password)
	{
		$sqlQuery = "
			SELECT userid, username 
			FROM " . $this->chatUsersTable . " 
			WHERE username='" . $username . "' AND password='" . $password . "'";
		return  $this->getData($sqlQuery);
	}
	public function chatUsers($userid)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->chatUsersTable . " 
			WHERE userid != '$userid'";
		return  $this->getData($sqlQuery);
	}
	public function getUserDetails($userid)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->chatUsersTable . " 
			WHERE userid = '$userid'";
		return  $this->getData($sqlQuery);
	}
	public function getUserAvatar($userid)
	{
		$sqlQuery = "
			SELECT img_profile 
			FROM " . $this->chatUsersTable . " 
			WHERE userid = '$userid'";
		$userResult = $this->getData($sqlQuery);
		$userAvatar = '';
		foreach ($userResult as $user) {
			$userAvatar = $user['img_profile'];
		}
		return $userAvatar;
	}
	public function updateUserOnline($userId, $online)
	{
		$sqlUserUpdate = "
			UPDATE " . $this->chatUsersTable . " 
			SET online = '" . $online . "' 
			WHERE userid = '" . $userId . "'";
		mysqli_query($this->dbConnect, $sqlUserUpdate);
	}
	public function insertChat($reciever_userid, $user_id, $chat_message, $lugar)
	{
		$sqlInsert = "
			INSERT INTO " . $this->chatTable . " 
			(reciever_userid, sender_userid, message, status, lugar) 
			VALUES ('" . $reciever_userid . "', '" . $user_id . "', '" . $chat_message . "', '1', '$lugar')";
		$result = mysqli_query($this->dbConnect, $sqlInsert);
		if (!$result) {
			return ('Error in query: ' . mysqli_error($this->dbConnect));
		} else {
			$conversation = $this->getUserChat($user_id, $reciever_userid);
			$data = array(
				"conversation" => $conversation
			);
			echo json_encode($data);
		}
	}
	// hacemos un get al chat
	public function getChatPeronal($from_user_id, $to_user_id)
	{
		$fromUserAvatar = $this->getUserAvatar($from_user_id);

		$sqlQuery = "
			SELECT * FROM " . $this->chatTable . " 
			WHERE (sender_userid = '" . $from_user_id . "' 
			AND reciever_userid = '" . $to_user_id . "') 
			OR (sender_userid = '" . $to_user_id . "' 
			AND reciever_userid = '" . $from_user_id . "') 
			ORDER BY timestamp ASC";



		$userChat = $this->getData($sqlQuery);

		$conversation = '<ul>';
		foreach ($userChat as $chat) {
			$nombreUsuario = $chat['fname'];
			$toUserAvatar =  $chat['img_profile'];
			$lugarUsuario = $chat['lugar']; //lugar del usuario x
			$tipoAvatar = $chat['avatar']; //avatar del usuario x
			$estadoUsuario = $chat['online']; // mi estado 
			// estado del usuario que  envia el mensaje 
			$estadoOtro = $chat['status'];
			$user_name = '';

			if ($chat["sender_userid"] == $from_user_id) {
				$conversation .= '<li class="sent" >' . '<div hidden id="lugar-usuario">' . $lugarUsuario . '</div>' . '<div hidden id="avatar-usuario">' . $tipoAvatar . '</div>' . '<div hidden id="estado-usuario">' . $estadoUsuario . '</div>';
				$conversation .= '<img width="22px" height="22px" src="userpics/' . $fromUserAvatar . '" alt="" /> ';
			} else {
				$conversation .= '<li class="replies">';
				$conversation .= '<img width="22px" height="22px" src="userpics/' . $toUserAvatar . '" alt="" /><span>' . $nombreUsuario . '</span>' . '<div hidden id="lugar-otro-usuario">' . $lugarUsuario . '</div>' . '<div hidden id="avatar-otro-usuario">' . $tipoAvatar . '</div>' . '<div hidden id="estado-otro-usuario">' . $estadoUsuario . '</div>';
			}

			$conversation .= '<p>' . $chat["message"] . '</p>';
			$conversation .= '</li>';
		}

		$conversation .= '</ul>';

		return $conversation;
	}
	public function getUserChat($from_user_id, $to_user_id)
	{
		$fromUserAvatar = $this->getUserAvatar($from_user_id);

		/*		
		$sqlQuery = "
			SELECT * FROM ".$this->chatTable." 
			WHERE (sender_userid = '".$from_user_id."' 
			AND reciever_userid = '".$to_user_id."') 
			OR (sender_userid = '".$to_user_id."' 
			AND reciever_userid = '".$from_user_id."') 
			ORDER BY timestamp ASC";
			*/

		$sqlQuery = "SELECT *
			FROM chat
			INNER JOIN chat_users
			ON chat.sender_userid = chat_users.userid
			ORDER BY timestamp ASC;";
		//echo $sqlQuery;

		$userChat = $this->getData($sqlQuery);

		$conversation = '<ul>';
		foreach ($userChat as $chat) {
			$nombreUsuario = $chat['fname'];
			$toUserAvatar =  $chat['img_profile'];
			$lugarUsuario = $chat['lugar']; //lugar del usuario x
			$tipoAvatar = $chat['avatar']; //avatar del usuario x
			$estadoUsuario = $chat['online']; // mi estado 
			// estado del usuario que  envia el mensaje 
			$estadoOtro = $chat['status'];
			$user_name = '';

			if ($chat["sender_userid"] == $from_user_id) {
				$conversation .= '<li class="sent" >' . '<div hidden id="lugar-usuario">' . $lugarUsuario . '</div>' . '<div hidden id="avatar-usuario">' . $tipoAvatar . '</div>' . '<div hidden id="estado-usuario">' . $estadoUsuario . '</div>';
				$conversation .= '<img width="22px" height="22px" src="userpics/' . $fromUserAvatar . '" alt="" /> ';
			} else {
				$conversation .= '<li class="replies">' . '<div hidden id="lugar-otro-usuario">' . $lugarUsuario . '</div>';
				$conversation .= '<img width="22px" height="22px" src="userpics/' . $toUserAvatar . '" alt="" /><span>' . $nombreUsuario . '</span>' . '<div hidden id="lugar-otro-usuario">' . $lugarUsuario . '</div>' . '<div hidden id="avatar-otro-usuario">' . $tipoAvatar . '</div>' . '<div hidden id="estado-otro-usuario">' . $estadoUsuario . '</div>';
			}

			$conversation .= '<p>' . $chat["message"] . '</p>';
			$conversation .= '</li>';
		}

		$conversation .= '</ul>';

		return $conversation;
	}

	public function showUserChat($from_user_id, $to_user_id)
	{
		$userDetails = $this->getUserDetails($to_user_id);
		$toUserAvatar = '';
		foreach ($userDetails as $user) {
			$toUserAvatar = $user['img_profile'];
			$userSection = '<div class="img_profile"> <span class="icon-arrow-left ico-back" onclick="abrirchat();"></span>  <img src="userpics/' . $user['img_profile'] . '" alt="user-icon" />
				<p>' . ' CONECTADO ' . '</p> </div>
				<div class="social-media">
					<i class="icon-facebook" aria-hidden="true"></i>
					<i class="icon-twitter" aria-hidden="true"></i>
					 <i class="icon-instagram" aria-hidden="true"></i> <span class="icon-x i-cerrar" onclick="cerrarChat();"></span>
				</div>';
		}
		// get user conversation
		$conversation = $this->getUserChat($from_user_id, $to_user_id);
		// update chat user read status		
		$sqlUpdate = "
			UPDATE " . $this->chatTable . " 
			SET status = '0' 
			WHERE sender_userid = '" . $to_user_id . "' AND reciever_userid = '" . $from_user_id . "' AND status = '1'";
		mysqli_query($this->dbConnect, $sqlUpdate);
		// update users current chat session
		$sqlUserUpdate = "
			UPDATE " . $this->chatUsersTable . " 
			SET current_session = '" . $to_user_id . "' 
			WHERE userid = '" . $from_user_id . "'";
		mysqli_query($this->dbConnect, $sqlUserUpdate);
		$data = array(
			"userSection" => $userSection,
			"conversation" => $conversation
		);
		echo json_encode($data);
	}
	// mirar un chat personal
	public function verChatPeronal($from_user_id, $to_user_id)
	{
		$userDetails = $this->getUserDetails($to_user_id);
		$toUserAvatar = '';
		foreach ($userDetails as $user) {
			$toUserAvatar = $user['img_profile'];
			$userSection = '<div class="img_profile"> <span class="icon-arrow-left ico-back" onclick="abrirchat();"></span>  <img src="userpics/' . $user['img_profile'] . '" alt="user-icon" />
				<p>' . ' CONECTADO ' . '</p> </div>
				<div class="social-media">
					<i class="icon-facebook" aria-hidden="true"></i>
					<i class="icon-twitter" aria-hidden="true"></i>
					 <i class="icon-instagram" aria-hidden="true"></i> <span class="icon-x i-cerrar" onclick="cerrarChat();"></span>
				</div>';
		}
		// get user conversation
		$conversation = $this->getUserChat($from_user_id, $to_user_id);
		// update chat user read status		
		$sqlUpdate = "
			UPDATE " . $this->chatTable . " 
			SET status = '0' 
			WHERE sender_userid = '" . $to_user_id . "' AND reciever_userid = '" . $from_user_id . "' AND status = '1'";
		mysqli_query($this->dbConnect, $sqlUpdate);
		// update users current chat session
		$sqlUserUpdate = "
			UPDATE " . $this->chatUsersTable . " 
			SET current_session = '" . $to_user_id . "' 
			WHERE userid = '" . $from_user_id . "'";
		mysqli_query($this->dbConnect, $sqlUserUpdate);
		$data = array(
			"userSection" => $userSection,
			"conversation" => $conversation
		);
		echo json_encode($data);
	}
	public function getUnreadMessageCount($senderUserid, $recieverUserid)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->chatTable . "  
			WHERE sender_userid = '$senderUserid' AND reciever_userid = '$recieverUserid' AND status = '1'";
		$numRows = $this->getNumRows($sqlQuery);
		$output = '';
		if ($numRows > 0) {
			$output = $numRows;
		}
		return $output;
	}
	public function updateTypingStatus($is_type, $loginDetailsId)
	{
		$sqlUpdate = "
			UPDATE " . $this->chatLoginDetailsTable . " 
			SET is_typing = '" . $is_type . "' 
			WHERE id = '" . $loginDetailsId . "'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}
	public function fetchIsTypeStatus($userId)
	{
		$sqlQuery = "
		SELECT is_typing FROM " . $this->chatLoginDetailsTable . " 
		WHERE userid = '" . $userId . "' ORDER BY last_activity DESC LIMIT 1";
		$result =  $this->getData($sqlQuery);
		$output = '';
		foreach ($result as $row) {
			if ($row["is_typing"] == 'yes') {
				$output = ' - <small></small>';
			}
		}
		return $output;
	}
	public function insertUserLoginDetails($userId)
	{
		$sqlInsert = "
			INSERT INTO " . $this->chatLoginDetailsTable . "(userid) 
			VALUES ('" . $userId . "')";
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		return $lastInsertId;
	}
	public function updateLastActivity($loginDetailsId)
	{
		$sqlUpdate = "
			UPDATE " . $this->chatLoginDetailsTable . " 
			SET last_activity = now() 
			WHERE id = '" . $loginDetailsId . "'";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}
	public function getUserLastActivity($userId)
	{
		$sqlQuery = "
			SELECT last_activity FROM " . $this->chatLoginDetailsTable . " 
			WHERE userid = '$userId' ORDER BY last_activity DESC LIMIT 1";
		$result =  $this->getData($sqlQuery);
		foreach ($result as $row) {
			return $row['last_activity'];
		}
	}
	// Actualizar el lugar del usuario cuando éste cambia de lugar
	public function actualizarLugarUsuario($nuevolugar, $userid)
	{
		$sql = "UPDATE $this->chatTable SET lugar = ? WHERE sender_userid = ? ORDER BY chatid DESC LIMIT 1";
		$stmt = mysqli_prepare($this->dbConnect, $sql);
		mysqli_stmt_bind_param($stmt, "si", $nuevolugar, $userid);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		// Verificar si la consulta se ejecutó correctamente
		if ($result) {
			// Consulta exitosa, obtener el estado actualizado
			$estadoActualizado = $nuevolugar;
		} else {
			// Consulta fallida, devolver un estado de error
			$estadoActualizado = "Error al actualizar el lugar";
		}

		// Devolver el estado actualizado
		return $estadoActualizado;
	}
	public function getUsersInigami()
	{
		$sql = "SELECT * from $this->chatUsersTable";
		$result = $this->getData($sql);
		return $result;
	}


	public function query($sql)
	{
		// $sql es la consulta SQL que deseas ejecutar
		$result = $this->dbConnect->query($sql);

		if (!$result) {
			die("Error en la consulta SQL: " . $this->dbConnect->error);
		}

		return $result;
	}

	public function crearCuenta($nombre, $apellido, $emailuser, $pasword, $pass_confirm, $rol_user)
	{
		$respuesta = array();
		$id_str = intval($rol_user);
		$encriptarcontraseña = md5($pasword);
		$traerusuario = $this->getUsersInigami();
		$emails_db = array();
		foreach ($traerusuario as $row) {
			$emails_db[] = $row['username']; // Agrega el correo actual al array
		}
		if (!in_array($emailuser, $emails_db)) {

			$sql = "INSERT INTO $this->chatUsersTable (name, lastname, username, password, confirmpassword, rol) VALUE(?,?,?,?,?,?)";
			$stmt = mysqli_prepare($this->dbConnect, $sql);

			if (!$stmt) {
				$respuesta["success"] = false;
				$respuesta["message"] = "Error en la preparación de la consulta: " . mysqli_error($this->dbConnect);
			} else {
				$stmt->bind_param('sssssi', $nombre, $apellido, $emailuser, $encriptarcontraseña, $pass_confirm, $id_str);
				$result = mysqli_stmt_execute($stmt);

				if (!$result) {
					$respuesta["success"] = false;
					$respuesta["message"] = "Error en la consulta: " . mysqli_error($this->dbConnect);
				} else {
					$respuesta["success"] = true;
					$respuesta["message"] = "Registro satisfactorio";
				}
			}

			echo json_encode($respuesta); // Esto es suficiente, elimina la segunda llamada a echo
		} else {
			$respuesta["success"] = false;
			$respuesta["message"] = "Este correo ya existe";
			echo json_encode($respuesta);
		}
	}
	public function actualizarDatosUsuario($nombre, $apellido, $email, $telf, $metodo_pago, $enlace_pago, $enlace_telegram, $genero, $id)
	{
		$sql = "UPDATE $this->chatUsersTable SET name=?, lastname=?, username=?, metodo_pago=?, enlace_pago=?, enlace_telegram=?, telefono=?, genero=? WHERE userid=?";
		$stmt = mysqli_prepare($this->dbConnect, $sql);

		// Verifica si la preparación de la consulta fue exitosa
		if ($stmt === false) {
			die("Error en la preparación de la consulta: " . mysqli_error($this->dbConnect));
		}

		// Vincula los parámetros con la consulta
		mysqli_stmt_bind_param($stmt, 'ssssssisi', $nombre, $apellido, $email, $metodo_pago, $enlace_pago, $enlace_telegram, $telf, $genero, $id);

		// Ejecuta la consulta
		$result = mysqli_stmt_execute($stmt);

		// Cierra la sentencia
		mysqli_stmt_close($stmt);

		if ($result) {
			// Consulta exitosa, se actualizó correctament

			$actualizadato = "Se actualizó correctamente";
		} else {
			// Consulta fallida, devuelve un estado de error
			$actualizadato = "Error al actualizar el usuario: " . mysqli_error($this->dbConnect);
		}

		// Devuelve el estado actualizado
		return $actualizadato;
	}
	public function insertarSerie($fileName, $nombre_serie, $link_referencial, $info_serie, $presupuesto_editor, $editores, $presupuesto_traductor, $traductores, $presupuesto_limpieza, $limpieza, $presupuesto_rh, $rh, $presupuesto_corrector, $corrector, $presupuesto_desensurador, $desensurador, $fecha_salida)
	{

		$respuesta = array(); // Inicializa la respuesta

		$sql = "INSERT INTO series (foto, nombre_de_la_serie, link_referencial, info_serie, presupuesto_editor, presupuesto_traductor, presupuesto_limpieza, presupuesto_rh, presupuesto_corrector, presupuesto_desensurador, fecha_salida) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $this->dbConnect->prepare($sql);

		if ($stmt) {
			$stmt->bind_param('sssssssssss', $fileName, $nombre_serie, $link_referencial, $info_serie, $presupuesto_editor, $presupuesto_traductor, $presupuesto_limpieza, $presupuesto_rh, $presupuesto_corrector, $presupuesto_desensurador, $fecha_salida);

			if ($stmt->execute()) {
				$serie_id = $this->dbConnect->insert_id; // Obtiene el ID de la serie insertada

				// Luego, inserta las relaciones con los editores
				if (strlen($editores) === 0) {  // O si $editores es un arreglo, usa count($editores)
					// Código para manejar el caso en el que $editores está vacío
				} else {
					$editores_ids = explode(",", $editores);
					foreach ($editores_ids as $editor_id) {
						$sql = "INSERT INTO editores (serie_id, editor_id) VALUES (?, ?)";
						$stmt_editor = $this->dbConnect->prepare($sql);
						if ($stmt_editor) {
							$stmt_editor->bind_param('ii', $serie_id, $editor_id);
							$stmt_editor->execute();
							$stmt_editor->close();
						} else {
							$respuesta["success"] = false;
							$respuesta["message"] = "Error en la consulta para los editores: " . $this->dbConnect->error;
						}
					}
				}

				// Inserta relaciones con traductores, limpieza, RH, correctores, desensuradores aquí
				if (strlen($traductores) === 0) {
				} else {
					$traductores_ids = explode(",", $traductores);
					foreach ($traductores_ids as $traductor_id) {
						$sql = "INSERT INTO traductores (serie_id, traductor_id) VALUES (?, ?)";
						$stmt_traductor = $this->dbConnect->prepare($sql);
						$stmt_traductor->bind_param('is', $serie_id, $traductor_id);
						$stmt_traductor->execute();
						$stmt_traductor->close();
					}
				}

				if (strlen($limpieza) === 0) {
				} else {
					$limpieza_ids = explode(",", $limpieza);
					foreach ($limpieza_ids as $limpieza_id) {
						$sql = "INSERT INTO limpieza (serie_id, limpieza_id) VALUES (?, ?)";
						$stmt_limpieza = $this->dbConnect->prepare($sql);
						$stmt_limpieza->bind_param('is', $serie_id, $limpieza_id);
						$stmt_limpieza->execute();
						$stmt_limpieza->close();
					}
				}

				if (strlen($rh) === 0) {
				} else {
					$rh_ids = explode(",", $rh);
					foreach ($rh_ids as $rh_id) {
						$sql = "INSERT INTO rh (serie_id, rh_id) VALUES (?, ?)";
						$stmt_rh = $this->dbConnect->prepare($sql);
						$stmt_rh->bind_param('is', $serie_id, $rh_id);
						$stmt_rh->execute();
						$stmt_rh->close();
					}
				}

				if (strlen($corrector) === 0) {
				} else {
					$corrector_ids = explode(",", $corrector);
					foreach ($corrector_ids as $corrector_id) {
						$sql = "INSERT INTO corrector (serie_id, corrector_id) VALUES (?, ?)";
						$stmt_corrector = $this->dbConnect->prepare($sql);
						$stmt_corrector->bind_param('is', $serie_id, $corrector_id);
						$stmt_corrector->execute();
						$stmt_corrector->close();
					}
				}

				if (strlen($desensurador) === 0) {
				} else {
					$desensurador_ids = explode(",", $desensurador);
					foreach ($desensurador_ids as $desensurador_id) {
						$sql = "INSERT INTO desensurador (serie_id, desensurador_id) VALUES (?, ?)";
						$stmt_dese = $this->dbConnect->prepare($sql);
						$stmt_dese->bind_param('is', $serie_id, $desensurador_id);
						$stmt_dese->execute();
						$stmt_dese->close();
					}
				}

				$respuesta["success"] = true;
				$respuesta["message"] = "Registro satisfactorio";
			} else {
				$respuesta["success"] = false;
				$respuesta["message"] = "Error en la consulta: " . $stmt->error;
			}
		} else {
			$respuesta["success"] = false;
		}

		echo json_encode($respuesta); // Retorna la respuesta
	}
	public function insertarCap ($nombre_capitulo, $link_referencial, $info_capitulo,$numero_serie, $nameFile, $cantidad_editores, $editoresVal, $cantidad_traductores, $traductoresVal, $cantidad_limpieza, $limpiezaVal, $cantidad_rh, $rhVal, $cantidad_correctores, $correctoresValue, $cantidad_desensurador, $desensuradorVal)
	{
		$respuesta = array();
		$sql = "INSERT INTO capitulo (nombre_cap, link_ref, info_cap, file_cap, serie_id, cantidad_editor, cantidad_corrector, cantidad_desensurador, cantidad_limpieza, cantidad_rh, cantidad_traductor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt= $this->dbConnect->prepare($sql);
		if($stmt){
			$stmt->bind_param('ssssiiiiiii', $nombre_capitulo, $link_referencial, $info_capitulo, $nameFile, $numero_serie, $cantidad_editores, $cantidad_correctores, $cantidad_desensurador, $cantidad_limpieza, $cantidad_rh, $cantidad_traductores);
			if ($stmt->execute()) {
				$cap_id = $this->dbConnect->insert_id;
				if(strlen($editoresVal) === 0){
				}else{
					$editors_id = explode(",", $editoresVal);
					foreach ($editors_id as $editor_id) {
						$sql="INSERT INTO editores (serie_id, cap_id, editor_id) VALUES (?, ?, ?)";
						$stmt_editor = $this->dbConnect->prepare($sql);
						if($stmt_editor){
							$stmt_editor->bind_param('iii', $numero_serie, $cap_id, $editor_id);
							$stmt_editor->execute();
							$stmt_editor->close();
						}else{
							$respuesta["success"] = false;
							$respuesta["message"] = "Error en la consulta para los editores: " . $this->dbConnect->error;
						}
					}
				}
				if(strlen($traductoresVal) === 0){
				}else{
					$traductors_id = explode(",", $traductoresVal);
					foreach ($traductors_id as $traductor_id) {
						$sql = "INSERT INTO traductores (serie_id, cap_id, traductor_id) VALUES (?, ?, ?)";
						$stmt_traductor = $this->dbConnect->prepare($sql);
						$stmt_traductor ->bind_param('iii' ,$numero_serie, $cap_id, $traductor_id);
						$stmt_traductor->execute();
						$stmt_traductor->close();
					}
				}
				if(strlen($limpiezaVal) === 0){}else{
					$limpies_id = explode(",", $limpiezaVal);
					foreach ($limpies_id as $limpieza_id) {
						$sql = "INSERT INTO limpieza (serie_id, cap_id,limpieza_id) VALUES(?, ?, ?)";
						$stmt_limpieza = $this->dbConnect->prepare($sql);
						$stmt_limpieza->bind_param('iii', $numero_serie, $cap_id, $limpieza_id);
						$stmt_limpieza->execute();
						$stmt_limpieza->close();
					}
				}
				if(strlen($rhVal) === 0){}else{
					$rhs_id = explode(",", $rhVal);
					foreach($rhs_id as $id_rh){
						$sql = "INSERT INTO rh (serie_id, cap_id, rh_id) VALUES(?, ?, ?)";
						$stmt_rh = $this->dbConnect->prepare($sql);
						$stmt_rh->bind_param('iii', $numero_serie, $cap_id, $id_rh);
						$stmt_rh->execute();
						$stmt_rh->close();
					}
				}
				if(strlen($correctoresValue) === 0){}else{
					$correctors_id = explode("," , $correctoresValue);
					foreach ($correctors_id as $corrector_id) {
						$sql = "INSERT INTO corrector (serie_id, cap_id, corrector_id) VALUES (?, ?, ?)";
						$stmt_corrector = $this->dbConnect->prepare($sql);
						$stmt_corrector->bind_param('iii', $numero_serie, $cap_id, $corrector_id);
						$stmt_corrector->execute();
						$stmt_corrector->close();
					}
				}
				if(strlen($desensuradorVal) === 0){}else{
					$desensurados_id= explode(",", $desensuradorVal);
					foreach ($desensurados_id as $des_id) {
						$sql = "INSERT INTO desensurador(serie_id, cap_id, desensurador_id) VALUES (?, ?, ?)";
						$stmt_dese = $this->dbConnect->prepare($sql);
						$stmt_dese->bind_param('iii', $numero_serie, $cap_id, $des_id);
						$stmt_dese->execute();
						$stmt_dese->close();
					}
				}
				$respuesta["success"] = true;
				$respuesta["message"] = "Registro satisfactorio";
			}else
			{
				$respuesta["success"] = false;
				$respuesta["message"] = "Error en la consulta: " . $stmt->error;
			}
		}	else{
			$respuesta["success"] = false;
		}
		echo json_encode($respuesta);		
	}
}
