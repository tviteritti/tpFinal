<?php require 'views/header.php';?>
<?php require 'views/navEncargado.php';?>
    
<div style="width:80%;margin:auto;" class="w3-center;">
    <div class="w3-card-4  w3-border w3-border-yellow w3-round-large w3-yellow" style="margin-top: 100px;margin-right: 20px;">
        
        <div class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
        <h2>Modificar Vehiculo</h2>
        </div>
  
        
        <form class="w3-container" style="margin-top:20px" action="<?php echo constant('URL');?>encargado/actualizarVehiculo" method="POST">
            <label>Id</label>   
            <input class="w3-input" type="text" name="id" value="<?php echo $this->vehiculo->id;?>"><br>
            <label>marca</label>
            <input class="w3-input" type="text" name="marca" value="<?php echo $this->vehiculo->marca;?>"><br>
            <label>modelo</label>
            <input class="w3-input" type="text" name="modelo" value="<?php echo $this->vehiculo->modelo;?>"><br>
            <label>patente</label>
            <input class="w3-input" type="text" name="patente" value="<?php echo $this->vehiculo->patente;?>"><br>
            <label>nro_chasis</label>
            <input class="w3-input" type="text" name="nro_chasis" value="<?php echo $this->vehiculo->nro_chasis;?>"><br>
            <label>nro_motor</label>
            <input class="w3-input" type="text" name="nro_motor" value="<?php echo $this->vehiculo->nro_motor;?>"><br>
            <label>anio_fabricacion</label>
            <input class="w3-input" type="text" name="anio_fabricacion" value="<?php echo $this->vehiculo->anio_fabricacion;?>"><br>
            <label>service</label>
            <input class="w3-input" type="text" name="service" value="<?php echo $this->vehiculo->service;?>"><br>
            <label>kilometraje</label>
            <input class="w3-input" type="text" name="kilometraje" value="<?php echo $this->vehiculo->kilometraje;?>"><br>
            <label>max_combustible</label>
            <input class="w3-input" type="text" name="max_combustible" value="<?php echo $this->vehiculo->max_combustible;?>"><br>

            <input style="margin-top:40px" class="w3-button w3-block w3-green w3-hover-teal" type="submit" value="actualizar"><br><br>
            <div><?php echo $this->mensaje;?></div>
        </form>

    </div>
</div>

<?php require 'views/footer.php';?>