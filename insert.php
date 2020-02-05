<?php

include 'functions.php';

if(!empty($_POST) && controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['numero_letti']))) {

  $numero_stanza = intval($_POST['numero_stanza']);
  $piano = intval($_POST['piano']);
  $letti = intval($_POST['numero_letti']);

  $sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($numero_stanza, $piano, $letti, NOW(), NOW())";
  $result = creazioneQuery($sql);

}
else {
  $result = false;
}

if ($result == true) {
  $get_message = "?success=true";
}
else {
  $get_message = "?success=false";
}

header("Location: index.php" . $get_message);
?>
