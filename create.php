<?php

include 'layout/head.php';

?>
<main class="mt-3">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <h1 class="d-inline">Crea una nuova stanza</h1>
      <div class="d-inline-block text-right">
        <a class="btn btn-outline-primary align-text-bottom" href="index.php">Torna alla homepage</a>
      </div>
    </div>
    <div class="row">
      <form class="" action="insert.php" method="post">
        <div class="form-group">
          <label for="numero_stanza">Numero stanza</label>
          <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="">
        </div>
        <div class="form-group">
          <label for="piano">Piano</label>
          <input name="piano" type="text" class="form-control" id="piano" placeholder="">
        </div>
        <div class="form-group">
          <label for="numero_letti">Numero letti</label>
          <input name="numero_letti" type="text" class="form-control" id="numero_letti" placeholder="">
        </div>
        <button type="submit" class="btn btn-success">Crea stanza</button>
      </form>
    </div>
  </div>
</main>

<?php

include 'layout/footer.php';

?>
