<?php
session_start();
require "../../config.php";

$id = $_GET['id'];

if (!isset($_SESSION['COD_CLIENTE'])) {
    echo '<script>alert("Fai prima il login!");
            window.location.href = "http://localhost/progetto0/views/login-registrazione/login.php";
        </script>';
    exit();
} else if (isset($_SESSION['COD_CLIENTE'])) {
    $cod_cliente = $_SESSION['COD_CLIENTE'];


/* print_r(isset($_SESSION['COD_CLIENTE'])); */

?>

<?php require "../header.php"; ?>

    <div class="main" id="sign-up">
        <div class="main__container">
            <div class="main__img--container">
                <div class="main__img--card" id="card-2">
                    qua gli input del riepilogo
                </div>
            </div>
        </div>
    </div>


<?php include('../footer.php');
} ?>