<?php 

require("../model/mascota.php");

$id = $_GET ? $_GET['id'] : null;
    
if(!$id){
    header("Location: Registro.php");
    die();
}

$mascota = new Mascota();
$mascota_info = $mascota->buscarMascota($id);

?>