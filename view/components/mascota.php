<?php 

    class MascotaItem{

        private $id = 0;
        private $foto = "";
        private $nombre = "";
        private $tipo = "";
        private $sexo = "";
        private $telefono = "";
        
        function __construct($id, $foto, $nombre, $tipo, $sexo, $telefono){
            $this->id = $id;
            $this->foto = $foto;
            $this->nombre = $nombre;
            $this->tipo = $tipo;
            $this->sexo = $sexo;
            $this->telefono = $telefono;
        }

        function __toString(){
            return <<<CODIGO
            <div class="mascota card p-3 shadow">
                <img src="{$this->foto}" alt="" class="img"></img>
                <p class="fs-3">{$this->nombre}</p>
                <p>Tipo: {$this->tipo}</p>
                <p>Sexo: {$this->sexo}</p>
                <p>Contacto: {$this->telefono}</p>
                <div class="accion mx-auto">
                    <a title='Más información' href='reporte-animal.php?id={$this->id}'><i class='fad fa-info-square info'></i></a>
                    <a title='Editar' href='registro.php?id={$this->id}'><i class='fad fa-pen-square edit'></i></a>
                    <form action='registro.php' method='post'>
                        <button title='Eliminar' type='submit' value='$this->id' name='delete' style='border: none; margin: 0; padding: 0; background-color: transparent'><i class='fad fa-times-square delete'></i></button>
                    </form>
                </div> 
            </div> 
            CODIGO;
        }
    }

?>