<?php 
    require_once "../controller/reporte-animal.php";
    require_once "components/top.php";
    require_once "components/mapa.php";
?>

<div class="container">
    <div class="content">
       <div class="title card">
            <h2><i class="fad fa-paw me-2"></i></i>Mascota</h2>
       </div>
       <div class="foto-container mt-5 p-4 card">
            <img class="foto img" src="<?= $mascota_info['foto'] ?>" alt="<?= $mascota_info['nombre'] ?>">
       </div>
       <div class="mascota mt-4 card">
            <table class="table table-borderless">
                <tbody class="body">
                    <tr>
                        <th>Nombre</th>
                        <td><?= $mascota_info['nombre'] ?></td>
                    </tr>
                    <tr>
                        <th>Tipo</th>
                        <td><?= $mascota_info['tipo'] ?></td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td><?= $mascota_info['sexo'] ?></td>
                    </tr>
                    <tr>
                        <th>Color</th>
                        <td><?= $mascota_info['color'] ?></td>
                    </tr>
                    <tr>
                        <th>Fecha de nacimiento</th>
                        <td><?= str_replace(", 0:00", "", ucfirst($formato->format(new DateTime($mascota_info['fecha_nacimiento'])))) ?></td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td><?= $mascota_info['descripcion'] ?></td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td><?= $mascota_info['telefono'] ?></td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td><?= $mascota_info['correo'] ?></td>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <td><?= $mascota_info['codigo'] ?></td>
                    </tr>
                </tbody>
            </table>
       </div>
       <div class="ubicacion card mt-4">
            <h4 class="mt-3 text-center">Ubicación</h4>
            <?= new MapaItem(array($mascota_info)) ?>
       </div>
       <a href="Registro.php" class="btn btn-light mt-4"><i class="fad fa-arrow-left"></i> Registro</a>
    </div>
</div>

<?php 
    require_once "components/bottom.php"; 
?>