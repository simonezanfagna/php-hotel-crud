<?php

include 'functions.php';

$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id'];
$result = creazioneQuery($sql);

include 'layout/head.php';

?>
<main class="mt-3">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <h1 class="d-inline">Modifica stanza</h1>
      <div class="d-inline-block text-right">
        <a class="btn btn-outline-primary align-text-bottom" href="index.php">Torna alla homepage</a>
      </div>
    </div>
    <div class="row">
      <?php
        if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();?>
          <form class="" action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
              <label for="numero_stanza">Numero stanza</label>
              <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" value="<?php echo $row['room_number']; ?>">
            </div>
            <div class="form-group">
              <label for="piano">Piano</label>
              <input name="piano" type="text" class="form-control" id="piano" value="<?php echo $row['floor']; ?>">
            </div>
            <div class="form-group">
              <label for="numero_letti">Numero letti</label>
              <input name="numero_letti" type="text" class="form-control" id="numero_letti" value="<?php echo $row['beds']; ?>">
            </div>
            <button type="submit" class="btn btn-warning">Modifica stanza</button>
          </form>
      <?php }elseif ($result) { ?>
          <p>Non ci sono risultati</p>
      <?php }else {?>
          <p>Si è verificato un errore</p>
      <?php }
      ?>

    </div>
  </div>
</main>

<?php

include 'layout/footer.php';

?>
