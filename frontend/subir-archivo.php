<?php
$nombreTemporal = $_FILES['file-video']['tmp_name'];
$nombre = $_FILES['file-video']['name'];

move_uploaded_file($nombreTemporal, 'videos/' . $nombre);

?>
