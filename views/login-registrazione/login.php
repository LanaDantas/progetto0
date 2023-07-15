<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Accedi o registrati</title>
	<!-- CSS -->
	<link rel="stylesheet" href="../../assets/css/login-signin.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
	<!-- FONT ARVO -->
	<link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<!-- JAVASCRIPT -->
	<script src="../../assets/js/login-signin.js" charset="utf-8" defer></script>
</head>

<body>

	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="../../controllers/Registrazione.php" method="post">
				<h1>Crea un account</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>Registrati con email o nome utente</span>
				<input type="text" name="NOME" placeholder="Name" required />
				<input type="text" name="COGNOME" placeholder="Cognome" maxlength="10" required />
				<input type="email" name="EMAIL" placeholder="Email" required />
				<button type="submit" name="submit">Registrati</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="../../controllers/Login.php" method="post">
				
				<?php 
				if (isset($_GET['error'])) {
					$error = $_GET['error'];
					
					if ($error == 1) {
						echo '<div class="error_login1">Dati non validi. Prova ancora.</div>';
					}
				}
				
				$usernameValue = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : '';
				$passwordValue = isset($_POST['NOME']) ? $_POST['NOME'] : '';
				?>

				<h1>Accedi</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>Accedi con email o nome utente</span>
				<input type="text" name="NOME" placeholder="Nome" required />
				<input type="email" name="EMAIL" placeholder="Email" required />
				<a href="#">Password dimenticata?</a>
				<button type="submit" name="submit">Accedi</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Bentornato!</h1>
					<p>Per rimanere collegato, effetua il login con i tuoi dati.</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Ciao!</h1>
					<p>Inserisci i tuoi dati per iscriverti, è veloce e semplice.</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>