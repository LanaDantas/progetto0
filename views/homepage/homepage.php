<?php
require "../../config.php";
session_start();

if (isset($_SESSION['COD_CLIENTE'])) {
  $cod_cliente = $_SESSION['COD_CLIENTE'];
}
?>

<?php require "../header.php";

/* print_r(isset($_SESSION['COD_CLIENTE'])); */
?>


<!-- Hero Section -->
<div class="hero" id="home">
  <div class="hero__container">
    <h1 class="hero__heading"> TORINO <span>SPETTACOLI</span></h1>
    <p class="hero__description">LA BELLA ABITUDINE DEL TEATRO </p>
  </div>
</div>

<!-- Regio Section -->
<?php $data = $pdo->query("SELECT * FROM teatri WHERE COD_TEATRO = 'T002'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="regio" name="COD_TEATRO" value="T001">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="teatro_1" src="../../assets/images/teatro_regio.jpeg">
        </div>
      </div>
      <div class="main__content">
        <h1 name="NOME">
          <?php echo $row['NOME'] ?> <a onclick="toggleText()" class="icona_info"><i class="fa-solid fa-info" style="color: #ffffff;"></a></i>
        </h1>
        <div id="info_teatro" style="display: none;" class="info__teatro">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Sito: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="posti">Capienza: <span><?php echo $row['POSTI'] ?> </span></li>
          </ul>
        </div>
        <h2>Prenota subito il tuo biglietto</h2>
        <p>Stagione d'opera e balletto, concerti, altre attività e servizi di uno dei più grandi teatri d'Europa.</p>
        <button class="main__btn"><a href="../spettacoli/spettacoli.php?id=<?php echo $row['COD_TEATRO'] ?>">GUARDA GLI SPETTACOLI</a></button>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Carignano Section -->
<?php $data = $pdo->query("SELECT * FROM teatri WHERE COD_TEATRO = 'T001'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="carignano">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="teatro_1" src="../../assets/images/teatro_carignano.jpeg">
        </div>
      </div>
      <div class="main__content">
        <h1><?php echo $row['NOME'] ?> <a onclick="toggleText2()" class="icona_info">
            <i class="fa-solid fa-info" style="color: #ffffff;"></i></a>
        </h1>
        <div id="info_teatro2" style="display: none;" class="info__teatro">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Sito: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="posti">Capienza: <span><?php echo $row['POSTI'] ?> </span></li>
          </ul>
        </div>
        <h2>Prenota subito il tuo biglietto</h2>
        <p>Schedule a call to learn more about our services</p>
        <button class="main__btn"><a href="../spettacoli/spettacoli.php?id=<?php echo $row['COD_TEATRO'] ?>">GUARDA GLI SPETTACOLI</a></button>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- Alfieri Section -->
<?php $data = $pdo->query("SELECT * FROM teatri WHERE COD_TEATRO = 'T003'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="alfieri">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="teatro_1" src="../../assets/images/teatro_alfieri.jpeg">
        </div>
      </div>
      <div class="main__content">
        <h1>
          <?php echo $row['NOME'] ?> <a onclick="toggleText3()" class="icona_info">
            <i class="fa-solid fa-info" style="color: #ffffff;"></i></a>
        </h1>
        <div id="info_teatro3" style="display: none;" class="info__teatro">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Sito: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="posti">Capienza: <span><?php echo $row['POSTI'] ?> </span></li>
          </ul>
        </div>
        <h2>Prenota subito il tuo biglietto</h2>
        <p>Schedule a call to learn more about our services</p>
        <button class="main__btn"><a href="../spettacoli/spettacoli.php?id=<?php echo $row['COD_TEATRO'] ?>">GUARDA GLI SPETTACOLI</a></button>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Features Section -->
<div class="main" id="sign-up">
  <div class="main__container">
    <div class="main__content">
      <h1>Per acquistare i biglietti</h1>
      <h2>Fai il login</h2>
      <p>Ci vuole solo un minuto!</p>
      <button class="main__btn"><a href="http://localhost/progetto0/views/login-registrazione/login.php">Accedi</a></button>
    </div>
    <div class="main__img--container">
      <div class="main__img--card" id="card-2">
        <i class="fas fa-users"></i>
      </div>
    </div>
  </div>
</div>

<?php include('../footer.php'); ?>