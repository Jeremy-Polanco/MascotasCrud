<?php 

    require "connection.php";

    class Mascota{
        private $connection = null;

        function __construct()
        {   $connection = new Connection();
            $this->connection = $connection->conectar();
        }

        private function error(){
            echo "<h4 style='position: fixed; top: 130px; right: 10px; width: fit-content' class='card p-4 rounded shadow text-danger'>Hubo un error inesperado.</h4>";
        }

        function crearCodigo(){
            return hash('ripemd160', time());
        }

        public function insertarMascota($nombre, $descripcion, $fecha_nacimiento, $tipo, $sexo, $ubicacion, $telefono, $color, $foto, $correo){
            $codigo = $this->crearCodigo();
            try {
                $sentencia = $this->connection->prepare('INSERT INTO `mascota` (nombre, descripcion, fecha_nacimiento, tipo, sexo, ubicacion, telefono, color, foto, correo, codigo)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $sentencia->bindParam(1, $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(2, $descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(3, $fecha_nacimiento, PDO::PARAM_STR);
                $sentencia->bindParam(4, $tipo, PDO::PARAM_STR);
                $sentencia->bindParam(5, $sexo, PDO::PARAM_STR);
                $sentencia->bindParam(6, $ubicacion, PDO::PARAM_STR);
                $sentencia->bindParam(7, $telefono, PDO::PARAM_STR);
                $sentencia->bindParam(8, $color, PDO::PARAM_STR);
                $sentencia->bindParam(9, $foto, PDO::PARAM_STR);
                $sentencia->bindParam(10, $correo, PDO::PARAM_STR);
                $sentencia->bindParam(11, $codigo, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                $this->connection = null;
                return $resultado;
            } catch (PDOException $e) {
                print $e;
                $this->error();
            }
        }

        public function buscarMascotas(){
            try {
                $sentencia = $this->connection->prepare('SELECT id, nombre, tipo, sexo, telefono, foto, ubicacion FROM `mascota` ORDER BY `nombre` ASC');
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                $this->connection = null;
                return $resultado;
            } catch (PDOException $e) {
                $this->error();
            }
        }
        
        public function buscarMascota($id){  
            try {
                $sentencia = $this->connection->prepare('SELECT * FROM `mascota` WHERE id = ?');
                $sentencia->bindParam(1, $id, PDO::PARAM_INT);
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                $this->connection = null;
                return $resultado;
            } catch (PDOException $e) {
                $this->error();
            }
        }

        public function editarMascota($id, $nombre, $descripcion, $fecha_nacimiento, $tipo, $sexo, $ubicacion, $telefono, $color, $foto, $correo){  
            try {
                $sentencia = $this->connection->prepare('UPDATE `mascota` SET nombre = ?, descripcion = ?, fecha_nacimiento = ?, tipo = ?, sexo = ?, ubicacion = ?, telefono = ?, color = ?,
                foto = ?, correo = ? WHERE id = ?');
                $sentencia->bindParam(1, $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(2, $descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(3, $fecha_nacimiento, PDO::PARAM_STR);
                $sentencia->bindParam(4, $tipo, PDO::PARAM_STR);
                $sentencia->bindParam(5, $sexo, PDO::PARAM_STR);
                $sentencia->bindParam(6, $ubicacion, PDO::PARAM_STR);
                $sentencia->bindParam(7, $telefono, PDO::PARAM_STR);
                $sentencia->bindParam(8, $color, PDO::PARAM_STR);
                $sentencia->bindParam(9, $foto, PDO::PARAM_STR);
                $sentencia->bindParam(10, $correo, PDO::PARAM_STR);
                $sentencia->bindParam(11, $id, PDO::PARAM_INT);
                return $sentencia->execute();
                $this->connection = null;
            } catch (PDOException $e) {
                $this->error();
                return -3;
            }
        }

        public function eliminarMascota($id){  
            try {
                $sentencia = $this->connection->prepare('DELETE FROM `mascota` WHERE id = ?');
                $sentencia->bindParam(1, $id, PDO::PARAM_INT);
                $sentencia->execute();
                $this->connection = null;
            } catch (PDOException $e) {
                $this->error();
            }
        }
    }

?>