<?php 
  date_default_timezone_set("America/Santo_Domingo");
  setlocale(LC_TIME, 'es_DO.UTF-8','esp');

  $formato = new IntlDateFormatter(
    'es-ES',
    IntlDateFormatter::FULL,
    IntlDateFormatter::SHORT,
    'America/Santo_Domingo',
    IntlDateFormatter::GREGORIAN
  );

  $pagina = explode('.', explode('/', $_SERVER['REQUEST_URI'])[3])[0];
  
  if($pagina == ""){
    $pagina = "Mascotas";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
 <link rel="stylesheet" href="../style.css">
 <link rel="stylesheet" href="assets/<?php echo ($pagina == "Mascotas" ? 'index' : $pagina) ?>.css">
 <title><?php echo ucfirst(str_replace(array("-", "_"), " ", $pagina)) ?></title>
</head>
<body>
<div class="card position-absolute flex-row m-3 p-3 top">
  <div class="logo"><img class="logo-img" src="assets/img/pet-house.png"> <h4>Mascotas</h4></div>
  <div class="menu">
    <a class="btn btn-light" href="index.php"> Inicio</a>
    <a class="btn btn-light" href="registro.php">Registro</a>
    <a class="btn btn-light" href="mapa.php"> Mapa</a>
    <a class="btn btn-light" href="acerca.php"> Acerca de</a>
  </div>
</div>