<?php
include 'functions.php';

$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id'];
$result = creazioneQuery($sql);

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
            <div class="card" style="width: 25rem;">
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
            <!-- non ci sono risultati -->
        <?php }else {?>
            <!-- errore -->
        <?php }
        ?>
      </div>
    </div>
  </main>

<?php include 'layout/footer.php' ?>
