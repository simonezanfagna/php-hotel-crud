<?php

include 'functions.php';

$sql = "SELECT id, room_number, floor FROM stanze";
$result = creazioneQuery($sql);

include 'layout/head.php'
?>
  <main class="mt-3">

    <div class="container">
      <div class="row justify-content-between align-items-center">
        <h1 class="d-inline">Stanze dell'hotel</h1>
        <div class="d-inline-block text-right">
          <a class="btn btn-outline-primary align-text-bottom" href="#">Crea nuova stanza</a>
        </div>
      </div>
      <div class="row">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Room number</th>
              <th scope="col">Floor</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {?>
                  <tr>
                    <td><?php echo $row["room_number"]; ?></td>
                    <td><?php echo $row["floor"]; ?></td>
                    <td>
                      <a class="btn btn-outline-info" href="details.php?id=<?php echo $row["id"]; ?>">Visualizza</a>
                      <a class="btn btn-outline-warning" href="#">Modifica</a>
                      <a class="btn btn-outline-danger" href="#">Elimina</a>
                    </td>
                  </tr>
            <?php }
              }elseif ($result) { ?>
                <!-- non ci sono risultati -->
            <?php }else {?>
                <!-- errore -->
            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

<?php include 'layout/footer.php' ?>
