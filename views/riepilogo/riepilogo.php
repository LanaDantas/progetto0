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

?>
    <?php require "../header.php"; ?>

    <form action="" method="post">
        <div class="riepilogo_log">
            <!-- Hero Section -->
            <div class="hero__container">
                <p class="hero__description">RIEPILOGO DELLE PRENOTAZIONI</p>
                <div class="main__container">
                    <div class="main__img--container">
                        <div class="main__img--card" id="card-2">
                            <div class="nome_cog"></div>


                            <select id="selectbox" data-selected="">
                                <option value="" selected="selected" disabled="disabled">Select metodo di pagamento</option>
                                <option value="CARTA">Carta</option>
                                <option value="BONIFICO">Bonifico</option>
                                <option value="PAYPAL">PayPal</option>
                            </select>


                        </div>
                    </div>
                    <div class="main__content">
                        <button class="main__btn"><a href="">Conferma</a></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php include('../footer.php');
} ?>