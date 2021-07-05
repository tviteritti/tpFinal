<?php require 'views/header.php';?>
<?php require 'views/navChofer.php';?>

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
<div class="w3-col s6" id="mapa" style="width:500px; height:400px; margin-top:100px;"></div>
    <div class="w3-col s6" style="width:500px; height:400px; margin-top:100px;">
        <form class="w3-container" action="<?php echo constant('URL');?>chofer/actualizarDatos" method="POST">
            <label>Latitud:</label>
            <input class="w3-input" type="text" id="latitud" name="latitud" placeholder="latitud"><br>   
            <label>Longitud:</label>
            <input class="w3-input" type="text" id="longitud" name="longitud" placeholder="longitud"><br>
            <button type="submit" class="w3-block w3-button w3-teal w3-wide" name="registrarme">Enviar</button>
        </form>
    </div>
</div>
<?php require 'views/footer.php';?>