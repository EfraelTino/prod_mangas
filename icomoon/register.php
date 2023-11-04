<?php
session_start();
$title = "Register";
include('page-master/head.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);
	if (!empty($user)) {
		$_SESSION['username'] = $user[0]['username'];
		$_SESSION['userid'] = $user[0]['userid'];
		$chat->updateUserOnline($user[0]['userid'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
		$_SESSION['login_details_id'] = $lastInsertId;
		header("Location:conectado");
	} else {
		$loginError = "Usuario y Contraseña invalida";
	}
}

?>
<style>
	/* Estilo para ocultar el input file */
	.hidden-input {
		display: none;
	}

	/* Estilo para el botón simulado */
	.custom-file-input {
		display: inline-block;
		padding: 0px 16px;
		cursor: pointer;
		font-size: 14px;
		background-color: var(--color-primario);
		border: 1px solid var(--color-secundario);
		color: var(--color-white);
		border-radius: 4px;
		transition: var(--transition150);
		font-weight: 600;
	}

	.custom-file-input:hover {
		transform: scale(1.03);
		transition: var(--transition150);
	}
</style>

<body style="    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 0 10px; background-color: var(--color-primario);">
	<div class="wrapper wrapperregister">
		<section class="form signup">
			<header style="display: flex; justify-content: center;">
				<div>
					<img src="textures/conectado_logo.webp" alt="logo" width="200px" height="auto" style="border-radius: 0px;">
					<p style="text-align: center;">User register</p>

				</div>
			</header>
			<form action="logic/register.php" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="error-text"></div>
				<div class="name-details">
					<div class="field input">
						<label>Name</label>
						<input type="text" name="fname" placeholder="Your name" required >
					</div>
					<div class="field input">
						<label>Last name</label>
						<input type="text" name="lname" placeholder="Your last name" required>
					</div>
				</div>
				<div class="field input">
					<label>Email</label>
					<input type="text" name="email" placeholder="youremail@example.com" required >
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="password" placeholder="Your password" required >
					<i class="fas fa-eye"></i>
				</div>
				<div class="field image">
					<label>Your photo profile</label>
					<div class="img_options">
						<label for="file-upload" class="custom-file-input" id="file-label" style="color: white;">Choose file</label>
						<input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg"  id="file-upload" class="hidden-input" onchange="showFileName(event)" required>
						<span id="file-name">No file selected</span>
					</div>
				</div>
				<div class="field button input">
					<input type="submit" name="submit" value="Go" class="input_go">
				</div>
			</form>
			<div class="link">Have you already registered? <a href="./">Log in</a></div>
		</section>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

	<?php
	include "page-master/footer.php";
	?>