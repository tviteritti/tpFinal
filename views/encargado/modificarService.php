<?php require 'views/header.php';?>
<?php require 'views/navEncargado.php';?>
    
<div style="width:80%;margin:auto;" class="w3-center;">
    <div class="w3-card-4  w3-border w3-border-yellow w3-round-large w3-yellow" style="margin-top: 100px;margin-right: 20px;">
        
        <div class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
        <h2>Realizar service</h2>
        </div>
  
        
        <form class="w3-container" style="margin-top:20px" action="<?php echo constant('URL');?>encargado/actualizarService" method="POST">
            
            <input class="w3-input" type="hidden" name="id" value="<?php echo $this->vehiculo->id;?>"><br>
            <label>service</label>
            <input class="w3-input" type="date" name="service" value="<?php echo $this->vehiculo->service;?>"><br>

            <input style="margin-top:40px" class="w3-button w3-block w3-green w3-hover-teal" type="submit" value="actualizar"><br><br>
            <div><?php echo $this->mensaje;?></div>
        </form>

    </div>
</div>

<?php require 'views/footer.php';?>