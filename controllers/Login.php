<?php
session_start();

require "../config.php";

$email = $_POST['EMAIL'];
$nome = $_POST['NOME'];

$query = "SELECT COD_CLIENTE FROM clienti WHERE EMAIL = :EMAIL AND NOME = :NOME";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':EMAIL', $email);
$stmt->bindParam(':NOME', $nome);
$stmt->execute();

if ($stmt->rowCount() > 0) {
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$cod_cliente = $row['COD_CLIENTE'];

	$_SESSION['COD_CLIENTE'] = $cod_cliente;

	header('Location: http://localhost/progetto0/views/homepage/homepage.php');
	exit();
} else {
	header('Location: http://localhost/progetto0/views/login-registrazione/login.php?error=1');
	exit();
}
