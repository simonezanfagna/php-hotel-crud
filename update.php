<?php
include 'functions.php';

if(!empty($_POST) && !empty($_POST['id']) && controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['numero_letti']))) {

  $numero_stanza = intval($_POST['numero_stanza']);
  $piano = intval($_POST['piano']);
  $letti = intval($_POST['numero_letti']);
  $id = intval($_POST['id']);

  $sql = "UPDATE stanze SET room_number = $numero_stanza, floor = $piano,beds = $letti, updated_at = NOW() WHERE id = " . $id ;
  $result = creazioneQuery($sql);

}
else {
  $result = false;
}

if ($result == true) {
  $get_message = "?successModifica=true";
}
else {
  $get_message = "?successModifica=false";
}

header("Location: index.php" . $get_message);
?>
