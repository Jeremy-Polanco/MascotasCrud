<?php 
    require("../controller/registro.php");
    require("components/top.php");
    require("components/mascota.php");
?>

<div class="container">
    <div class="content">
        <h2 class="title card my-5 p-3 mx-auto shadow-lg"><?= $accion ?> mascota</h2>
        <div class="formulario-container card">
            <form class="formulario" action="registro.php" method="post">
                <input type="number" class="form-control" name="id" placeholder="ID" value="<?= $parametro ?>" hidden></input>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-money-check-edit"></i></span>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?= $nombre ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-paw"></i></span>
                    <input type="text" class="form-control" name="tipo" placeholder="Tipo" value="<?= $tipo ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-venus-mars"></i></span>
                    <select class="form-select" aria-label="Default select example" name="sexo" value="<?= $sexo ?>">
                        <option value="Varon" <?= $sexo == "Varon" ? "selected" : "" ?>>Varon</option>
                        <option value="Hembra" <?= $sexo == "Hembra" ? "selected" : "" ?>>Hembra</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-file-edit"></i></span>
                    <textarea class="form-control" name="descripcion" placeholder="Descripción" required><?= $descripcion ?></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Fecha de nacimiento</span>
                    <input type="date" class="form-control" name="fecha_nacimiento" value="<?= $fecha_nacimiento ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-map-marker-alt"></i></span>
                    <input type="text" class="form-control" name="ubicacion" placeholder="Ubicación" value="<?= $ubicacion ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-palette"></i></span>
                    <input type="text" class="form-control" name="color" placeholder="Color" value="<?= $color ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-phone"></i></span>
                    <input type="tel" class="form-control" name="telefono" placeholder="Teléfono" value="<?= $telefono ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-envelope"></i></span>
                    <input type="email" class="form-control" name="correo" placeholder="Correo" value="<?= $correo ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-image"></i></span>
                    <input type="text" class="form-control" name="foto" placeholder="Url foto" value="<?= $foto ?>" required></input>
                </div>
                <?php
                    if(isset($message) && $message){
                        echo "<p style='box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5)' class='text-light rounded p-1 bg-".$type_message." text-center'>".$text_message."</p>";
                    }
                ?>
                <div class="btns-container">
                    <button type="submit" class="btn btn-primary" name='boton' value="<?= $accion ?>"><?= $accion ?></button>
                    <?php
                        if(isset($parametro)){
                    ?>
                        <a href="registro.php" class="btn btn-danger">Cancelar</a>
                    <?php
                        }
                    ?>
                    
                </div>
            </form>
        </div>

        <div class="title card mt-5 p-3 mx-auto shadow-lg">
            <h2>Lista de mascotas</h2>
        </div> 
        <?php
            if(isset($mascotas) && count($mascotas) > 0){
        ?>
            <div class="mascotas mt-5 mx-auto">
                <?php 
                    foreach($mascotas as $mascota){
                        echo new MascotaItem($mascota["id"], $mascota["foto"], $mascota["nombre"], $mascota["tipo"], $mascota["sexo"], $mascota["telefono"]);
                    }
                ?>
            </div>
        <?php
            }
            else{
        ?>
            <div class="nodata mt-5 card">
                <h5 class="my-3">No hay tareas que mostrar.</h5>
            </div>
        <?php 
            }
        ?>
    </div>
</div>

<?php 
    require("components/bottom.php"); 
?>  