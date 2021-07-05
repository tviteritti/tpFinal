 <?php require 'views/header.php';?>
<?php require 'views/navChofer.php';?>


<div style="width:80%;margin:auto;" class="w3-center;">
    <div class="w3-card-4  w3-border w3-border-yellow w3-round-large w3-yellow" style="margin-top: 100px;margin-right: 20px;">
        <form class="w3-container" action="<?php echo constant('URL');?>chofer/actualizarDatos" method="POST">

            <h3><div><?php echo $this->mensaje;?></div></h3>
            <div style="margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h2>Datos del Viaje</h2>
            </div>

            <label>Kilometro:</label>
            <input class="w3-input" type="text" name="kilometros" placeholder="kilometro"><br>
            <label>Combustible:</label>
            <input class="w3-input" type="text" name="combustible" placeholder="combustible"><br>
            <label>Combustible Comprado:</label>
            <input class="w3-input" type="text" name="combustible_comprado" placeholder="combustible_comprado"><br>   
            <label>Viaticos:</label>
            <input class="w3-input" type="text" name="viaticos_r" placeholder="viaticos_r"><br>    
            <label>Peajes Pasajes:</label>
            <input class="w3-input" type="text" name="peajes_pesajes_r" placeholder="peajes_pesajes_r"><br>  
            <input class="w3-input" type="text" name="extras_r" placeholder="extras_r"><br>   
            <label>Hazard:</label>
            <input class="w3-input" type="text" name="hazard_r" placeholder="hazard_r"><br>
            <label>Reefer:</label>
            <input class="w3-input" type="text" name="reefer_r" placeholder="reefer_r"><br>
            <label>Fee:</label>
            <input class="w3-input" type="text" name="fee_r" placeholder="fee_r"><br> 


<script src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAiq3xISXSZYgkd9GDAOdajy4NK2d3L7dY"></script>
    <script>
        function loadMap() {

            var mapOptions = {
                center:new google.maps.LatLng(-34.6686986,-58.5614947),
                zoom:12,
                panControl: false,
                zoomControl: false,
                scaleControl: false,
                mapTypeControl:false,
                streetViewControl:true,
                overviewMapControl:true,
                rotateControl:true,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-34.6686986,-58.5614947),
                map: map,
                draggable:true,
                
            });

             google.maps.event.addListener(marker, "click", function (event) {
                var i=document.getElementById("latitud").value = event.latLng.lat();
                var i=document.getElementById("longitud").value = event.latLng.lng();
                
            });

        }
    </script>

<body onload="loadMap()">
<div class="w3-row-padding">
    <div class="w3-col  l6 s12">
        <div class="" id="mapa" style="height:400px; margin-top:50px;"></div>
    </div>
    <div class="w3-col l6 s12 w3-center" style="margin-top:50px;">
        <div class="w3-center" style="margin:auto;">
            <label>Latitud:</label>
            <input class="w3-input" type="text" id="latitud" name="latitud" placeholder="latitud"><br>   
            <label>Longitud:</label>
            <input class="w3-input" type="text" id="longitud" name="longitud" placeholder="longitud"><br>
        </div>
       
    </div>
</div>

            <div style="margin:50px 0;" class="w3-row-padding">
                <div class="w3-col s6 ">
                    <input class="w3-button w3-block w3-blue w3-hover-teal" type="submit" value="actualizar"> 
                </div>
                <div class="w3-col s6">
                    <a class="w3-button w3-block w3-green w3-hover-teal" type="submit" href="<?php echo constant('URL');?>chofer/finalizarViaje"value="finalizar viaje">Finalizar Viaje</a> 
                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'views/footer.php';?>