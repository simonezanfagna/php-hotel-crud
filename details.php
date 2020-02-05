<?php
include 'functions.php';

$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id'];
$result = creazioneQuery($sql);

$sql_prenotazione = "SELECT *, prenotazioni_has_ospiti.created_at, prenotazioni_has_ospiti.updated_at FROM prenotazioni_has_ospiti LEFT JOIN prenotazioni ON prenotazioni_has_ospiti.prenotazione_id = prenotazioni.id JOIN ospiti ON prenotazioni_has_ospiti.ospite_id = ospiti.id JOIN stanze ON prenotazioni.stanza_id = stanze.id JOIN configurazioni ON prenotazioni.configurazione_id = configurazioni.id WHERE stanze.id = " . $_GET['id'];
$result_prenotazione = creazioneQuery($sql_prenotazione);


include 'layout/head.php';

?>

  <main class="mt-3">

    <div class="container">
      <div class="row justify-content-between align-items-center">
        <h1 class="d-inline">Dettagli stanza</h1>
        <div class="d-inline-block text-right">
          <a class="btn btn-outline-primary align-text-bottom" href="index.php">Torna alla homepage</a>
        </div>
      </div>
      <div class="row justify-content-center mt-5">
        <?php
          if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();?>
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Stanza <?php echo $row['id']; ?></h5>
                <ul>
                    <li>Numero stanza: <?php echo $row['room_number']; ?></li>
                    <li>Piano: <?php echo $row['floor']; ?></li>
                    <li>Numero letti: <?php echo $row['beds']; ?></li>
                    <li>Data creazione: <?php echo $row['created_at']; ?></li>
                    <li>Data ultima modifica: <?php echo $row['updated_at']; ?></li>
                </ul>
              </div>
            </div>
        <?php }elseif ($result) { ?>
            <p>Non ci sono risultati</p>
        <?php }else {?>
            <p>Si è verificato un errore</p>
        <?php }
        ?>
        <?php
          if ($result_prenotazione && $result->num_rows > 0) {
            while ($row = $result_prenotazione->fetch_assoc()) {?>
              <div class="card" style="width: 100%;">
                <div class="card-body">
                  <h5 class="card-title">Prenotazioni stanza <?php echo $row['stanza_id']; ?></h5>
                  <ul>
                      <li>Prenotazione: <?php echo $row['prenotazione_id']; ?></li>
                      <li>Ospite ID: <?php echo $row['ospite_id']; ?></li>
                      <li>Nome: <?php echo $row['name']; ?></li>
                      <li>Cognome: <?php echo $row['lastname']; ?></li>
                      <li>Documento: <?php echo $row['document_type']; ?></li>
                      <li>Numero documento: <?php echo $row['document_number']; ?></li>
                      <li>Data di nascita: <?php echo $row['date_of_birth']; ?></li>
                      <li>Configurazione ID: <?php echo $row['configurazione_id']; ?></li>
                      <li>Configurazione: <?php echo $row['title']; ?></li>
                      <li>Data creazione: <?php echo $row['created_at']; ?></li>
                      <li>Data ultima modifica: <?php echo $row['updated_at']; ?></li>
                  </ul>
                </div>
              </div>
          <?php  }
         }elseif ($result) { ?>
            <p>Non ci sono risultati</p>
        <?php }else {?>
            <p>Si è verificato un errore</p>
        <?php }
        ?>
      </div>
    </div>
  </main>

<?php include 'layout/footer.php' ?>
