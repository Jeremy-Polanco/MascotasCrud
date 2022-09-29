<?php 
    require("../controller/mapa.php");
    require("components/top.php");
    require("components/mapa.php"); 
?>

<div class="container">
    <div class="content">
        <div class="title card p-3 mx-auto shadow-lg">
            <h2><i class="fad fa-map-marked-alt me-3"></i>Mapa de mascotas</h2>
        </div> 
        <div class="ubicacion card mt-4">
            <?= new MapaItem($mascotas) ?>
        </div>
    </div>
</div>

<?php 
    require("components/bottom.php"); 
?>  