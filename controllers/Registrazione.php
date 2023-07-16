<?php
session_start();

require "../config.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['NOME'];
    $cognome = $_POST['COGNOME'];
    $telefono = $_POST['TELEFONO'];
    $email = $_POST['EMAIL'];

    $query = "INSERT INTO clienti (NOME, COGNOME, TELEFONO, EMAIL) VALUES (:NOME, :COGNOME, :TELEFONO, :EMAIL)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':NOME', $nome);
    $stmt->bindParam(':COGNOME', $cognome);
    $stmt->bindParam(':TELEFONO', $telefono);
    $stmt->bindParam(':EMAIL', $email);

    $stmt->execute();



    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $cod_cliente = $row['COD_CLIENTE'];

        $_SESSION['COD_CLIENTE'] = $cod_cliente;

        header('Location: http://localhost/progetto0/views/login-registrazione/login.php?success=1');
        exit();
    } else {
        header('Location: http://localhost/progetto0/views/login-registrazione/login.php?error=1');
        exit();
    }
}

/*   try {
    $stmt->execute();
    $_SESSION['success_message'] = 'Registrazione effetuata con sucesso! Procedere al login.';
    header('Location: login.php');
    exit();
  } catch (PDOException $e) {
    echo 'Erro ao registrar usuário: ' . $e->getMessage();
    exit();
  }
}

if (isset($_SESSION['success_message'])) {
  echo '<p class="success_register1">' . $_SESSION['success_message'] . '</p>';
  unset($_SESSION['success_message']);
} */
