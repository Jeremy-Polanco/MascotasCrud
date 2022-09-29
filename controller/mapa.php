<?php

require("../model/mascota.php");

$mascota = new Mascota();
$mascotas = $mascota->buscarMascotas();

?>