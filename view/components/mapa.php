<?php 

    class MapaItem{

        private $mascotas = "";
        
        function __construct($mascotas){
            $this->mascotas = json_encode($mascotas);
        }

        function __toString(){
            return <<<CODIGO
            <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
            <script>
                let mascotas = {$this->mascotas};

                onload = () => {
                    crearMapa();
                }
                
                const crearMapa = () => {
                    let map = L.map('map').setView([18.4519423, -69.6629965], 17);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    
                    if(mascotas.length > 0){
                        mascotas.forEach(mascota => {
                            const lat = Number(mascota['ubicacion'].split(",")[0]);
                            const long = Number(mascota['ubicacion'].split(",")[1]);
                            L.marker([lat, long]).addTo(map)
                            .bindPopup('<a href="reporte-animal.php?id=' + mascota['id'] + '"><img class="img rounded" src="' + mascota['foto'] + '" title="' + mascota['nombre'] + '" style="height: 45px; width: 45px;"></img></a>')
                            .openPopup()
                        })
                    }
                }
            </script>
            <div id="map" style='height: 500px; width: 600px; margin: 20px'>
            </div>
            CODIGO;
        }
    }

?>