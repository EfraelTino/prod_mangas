<?php
session_start();
$title = "Login";

include('page-master/head.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['username'], md5($_POST['pwd'])); // Verificar la contraseña con md5
	if (!empty($user)) {
		$_SESSION['username'] = $user[0]['username'];
		$_SESSION['userid'] = $user[0]['userid'];
		$chat->updateUserOnline($user[0]['userid'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
		$_SESSION['login_details_id'] = $lastInsertId;
		header("Location: conectado");
	} else {
		$loginError = "User and passowrd invalid";
	}
}
?>

<body>
	<div class="container-login">
		<div class="login-form">
			<div class="form-login-container">
				<div>
					<img src="textures/conectado_logo.webp" alt="logo" width="200px" height="auto" style="border-radius: 0px;">
					<p style="text-align: center; font-weight: 700; font-size: 24px;">Log In</p>

				</div>
				<form method="post">
					<div class="form-groups">
						<?php if ($loginError) { ?>
							<div class="alert-error"><?php echo $loginError; ?></div>
						<?php } ?>
					</div>
					<div class="form-groups">
						<label for="username">Email:</label>
						<input type="text" class="form-login" name="username" placeholder="Email" required>
					</div>
					<div class="form-groups">
						<label for="pwd">Password:</label>
						<input type="password" class="form-login" name="pwd" placeholder="Password" required id="password">
						<i class="icon-eye icon-eys" id="icon-eyes"></i>
					</div>
					<div class="form-groups">
						<button type="submit" name="login" class="btn-login">Log in</button>
					</div>
				</form>
				<div class="form-groups opcion">
					<p class="opcion-registro">You have not yet registered? <a href="./register">Register here</a> </p>
				</div>
			</div>
		</div>
	</div>


	<script src="./js/functions.js" type=""></script>

	<?php
	include "page-master/footer.php";
	?>