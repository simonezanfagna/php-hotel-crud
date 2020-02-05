<?php

include 'functions.php';

if (!empty($_POST['id'])){
  $id = $_POST['id'];
  $sql = "DELETE FROM stanze WHERE id = " . $id;
  $result = creazioneQuery($sql);
}
else {
  $result = false;
}

if ($result == true) {
  $get_message = "?successElimina=true";
}
else {
  $get_message = "?successElimina=false";
}

header("Location: index.php" . $get_message);

?>
