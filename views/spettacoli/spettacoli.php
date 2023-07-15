<?php
require "../../config.php";

$id = $_GET['id'];

?>

<?php require "../header.php"; ?>

<!-- Spettacoli Section -->
<form action="" method="post">
    <?php $data = $pdo->query("SELECT s.*, r.COD_REPLICA, r.DATA_REPLICA
                                    FROM repliche as r
                                    INNER JOIN spettacoli as s
                                    ON r.COD_SPETTACOLO = s.COD_SPETTACOLO
                                    WHERE COD_TEATRO = '$id'")->fetchAll(); ?>

    <div class="services" id="services">
        <?php $result = $pdo->query("SELECT * FROM teatri WHERE COD_TEATRO = '$id'")->fetchAll(); ?>
        <?php foreach ($result as $row) : ?>
            <h1>Spettacoli del <?php echo $row['NOME']; ?></h1>
        <?php endforeach; ?>
        <div class="services__wrapper">
            <?php foreach ($data as $row) : ?>
                <div class="services__card">
                    <h2><?php echo $row['TITOLO']; ?></h2>
                    <p><?php echo $row['AUTORE'] ?></p>
                    <p><?php echo $row['REGISTA'] ?></p>
                    <br>
                    <h3>Repliche <?php echo $row['COD_REPLICA'] ?>:</h3>
                    <p><?php echo $row['DATA_REPLICA'] ?> h. 21</p>
                    <br>
                    <h4>Prezzo: <?php echo $row['PREZZO'] ?> €</h4>
                    <div class="services__btn"><a href="">Prenota biglietto</a href=""></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</form>

<?php include('../footer.php'); ?>