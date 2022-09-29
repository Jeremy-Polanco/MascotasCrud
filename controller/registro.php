<?php 

require("../model/mascota.php");

$mascota = new Mascota();
$mascotas = $mascota->buscarMascotas();

$parametro = $_GET ? $_GET['id'] : null;
$accion = $parametro ? "Editar" : "Crear";

$nombre = "";
$descripcion = "";
$fecha_nacimiento = "";
$tipo = "";
$sexo = "Varon";
$ubicacion = "";
$telefono = "";
$color = "";
$foto = "";
$correo = "";

$message = false;
$text_message = "";
$type_message = "";

function message($type, $text){
    $GLOBALS["message"] = true;
    $GLOBALS["text_message"] = $text;
    $GLOBALS["type_message"] = $type;
}

if($parametro){
    $mascota = new Mascota();
    $mascota_info = $mascota->buscarMascota($parametro);

    $nombre = $mascota_info['nombre'];
    $descripcion = $mascota_info['descripcion'];
    $fecha_nacimiento = $mascota_info['fecha_nacimiento'];
    $tipo = $mascota_info['tipo'];
    $sexo = $mascota_info['sexo'];
    $ubicacion = $mascota_info['ubicacion'];
    $telefono = $mascota_info['telefono'];
    $color = $mascota_info['color'];
    $foto = $mascota_info['foto'];
    $correo = $mascota_info['correo'];
}

if($_POST){
    if(isset($_POST['delete'])){
        $mascota = new Mascota();
        $mascota->eliminarMascota($_POST['delete']);
        header("Location: registro.php");
    }
    else{
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $fecha_nacimiento = trim($_POST['fecha_nacimiento']);
        $tipo = trim($_POST['tipo']);
        $sexo = trim($_POST['sexo']);
        $ubicacion = trim($_POST['ubicacion']);
        $telefono = trim($_POST['telefono']);
        $color = trim($_POST['color']);
        $foto = trim($_POST['foto']);
        $correo = trim($_POST['correo']);
        
        $boton = $_POST['boton'];

        if($nombre == "" || $descripcion == "" || $fecha_nacimiento == "" || $tipo == "" || $correo == "" || $foto == "" || $color == "" || $sexo == "" || $ubicacion == "" || $telefono == ""){
            message("danger", "Debe colocar todos los campos correctamente.");
        }
        else{
            $mascota = new Mascota();

            if($boton == 'Editar'){
                $id = $_POST['id'];
                $respuesta = $mascota->editarMascota($id, $nombre, $descripcion, $fecha_nacimiento, $tipo, $sexo, $ubicacion, $telefono, $color, $foto, $correo);
                if($respuesta == 1)
                {
                    header("Location: registro.php");
                    die();
                }
                $parametro = $id;
                message("danger", "Error al editar.");
                $accion = "Editar";
            }
            else{
                $mascota->insertarMascota($nombre, $descripcion, $fecha_nacimiento, $tipo, $sexo, $ubicacion, $telefono, $color, $foto, $correo);
                $nombre = "";
                $descripcion = "";
                $fecha_nacimiento = "";
                $tipo = "";
                $ubicacion = "";
                $telefono = "";
                $color = "";
                $foto = "";
                $correo = "";
                $sexo = "Varon";
                message("success", "Mascota creada.");
                header("Location: registro.php");
            }
        }
    }
}

?>