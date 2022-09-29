<?php 
    require("components/top.php");
    require("components/mascota.php");
    require("../controller/registro.php");
?>

<div class="container">
    <div class="content">
        <h2 class="title card my-5 p-3 mx-auto shadow-lg"><?php echo $accion ?> mascota</h2>
        <div class="formulario-container card">
            <form class="formulario" action="registro.php" method="post">
                <input type="number" class="form-control" name="id" placeholder="ID" value="<?php echo $parametro ?>" hidden></input>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-money-check-edit"></i></span>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-paw"></i></span>
                    <input type="text" class="form-control" name="tipo" placeholder="Tipo" value="<?php echo $tipo ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-venus-mars"></i></span>
                    <select class="form-select" aria-label="Default select example" name="sexo" value="<?php echo $sexo ?>">
                        <option value="Varon">Varon</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-file-edit"></i></span>
                    <textarea class="form-control" name="descripcion" placeholder="Descripción" required><?php echo $descripcion ?></textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-map-marker-alt"></i></span>
                    <input type="text" class="form-control" name="ubicacion" placeholder="Ubicación" value="<?php echo $ubicacion ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-palette"></i></span>
                    <input type="text" class="form-control" name="color" placeholder="Color" value="<?php echo $color ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-phone"></i></span>
                    <input type="tel" class="form-control" name="telefono" placeholder="Teléfono" value="<?php echo $telefono ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-envelope"></i></span>
                    <input type="email" class="form-control" name="correo" placeholder="Correo" value="<?php echo $correo ?>" required></input>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fad fa-image"></i></span>
                    <input type="text" class="form-control" name="foto" placeholder="Url foto" value="<?php echo $foto ?>" required></input>
                </div>
                <?php
                    if(isset($message) && $message){
                        echo "<p style='box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5)' class='text-light rounded p-1 bg-".$type_message." text-center'>".$text_message."</p>";
                    }
                ?>
                <div class="btns-container">
                    <button type="submit" class="btn btn-primary" name='boton' value="<?php echo $accion ?>"><?php echo $accion ?></button>
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
        <div class="mascotas mt-5 mx-auto">
            <?php foreach($mascotas as $mascota){
                echo new MascotaItem($mascota["id"], $mascota["foto"], $mascota["nombre"], $mascota["tipo"], $mascota["sexo"], $mascota["telefono"]);
            } ?>
        </div> 
    </div>
</div>

<?php 
    require("components/bottom.php"); 
?>  