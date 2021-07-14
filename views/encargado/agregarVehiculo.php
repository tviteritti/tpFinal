<?php require 'views/header.php';?>
<?php require 'views/navEncargado.php';?>

<div style="width:80%;margin:auto;" class="w3-center;">
    <div class="w3-card-4  w3-border w3-border-yellow w3-round-large w3-yellow" style="margin-top: 100px;margin-right: 20px;">

                
        <form class="w3-container" style="margin-top:20px" action="<?php echo constant('URL');?>encargado/cargarVehiculo" method="POST">

            <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h2>Vehiculo</h2>
            </div>

            <label>marca:</label>
            <input class="w3-input" type="text" name="marca" require>
            <label>modelo:</label>
            <input class="w3-input" type="text" name="modelo" require>
            <label>patente:</label>
            <input class="w3-input" type="text" name="patente" require>
            <label>nro_chasis:</label>
            <input class="w3-input" type="number" name="nro_chasis" require>
            <label>nro_motor:</label>
            <input class="w3-input" type="number" name="nro_motor" require>
            <label>anio_fabricacion:</label>
            <input class="w3-input" type="number" name="anio_fabricacion" require>
            <label>service:</label>
            <input class="w3-input" type="date" name="service" >
            <label>kilometraje:</label>
            <input class="w3-input" type="number" name="kilometraje"require >
            <label>max_combustible:</label>
            <input class="w3-input" type="number" name="max_combustible" require>
                  

            <input style="margin-top: 90px" class="w3-button w3-block w3-green w3-hover-teal" type="submit" value="Cargar Proforma"><br><br>

        </form>
    </div>
</div>

<?php require 'views/footer.php';?>