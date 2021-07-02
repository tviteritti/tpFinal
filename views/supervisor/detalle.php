<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>detalle</h1>

<form action="<?php echo constant('URL');?>supervisor/actualizarProforma" method="POST">

    <h1>Proforma</h1>

    <input type="text" name="numero" value="<?php echo $this->proforma->numero;?>"><br>
    <input type="text" name="fecha" value="<?php echo $this->proforma->fecha;?>"><br>
    <input type="text" name="id_viaje" value="<?php echo $this->proforma->id_viaje;?>"><br>
    <input type="text" name="id_carga" value="<?php echo $this->proforma->id_carga;?>"><br>
    <input type="text" name="id_costeo_estimado" value="<?php echo $this->proforma->id_costeo_estimado;?>"><br>
    <input type="text" name="id_chofer" value="<?php echo $this->proforma->id_chofer;?>"><br>
    <input type="text" name="id_vehiculo" value="<?php echo $this->proforma->id_vehiculo;?>"><br>


    <h1>viaje</h1>

    <input type="text" name="origen" value="<?php echo $this->proforma->origen;?>"><br>
    <input type="text" name="destino" value="<?php echo $this->proforma->destino;?>"><br>
    <input type="text" name="fecha_carga" value="<?php echo $this->proforma->fecha_carga;?>"><br>
    <input type="text" name="ETA" value="<?php echo $this->proforma->ETA;?>"><br>
 
    <h1>carga</h1>


    <input type="text" name="tipo" value="<?php echo $this->proforma->tipo;?>"><br>
    <input type="text" name="peso_neto" value="<?php echo $this->proforma->peso_neto;?>"><br>
    <input type="text" name="hazard" value="<?php echo $this->proforma->hazard;?>"><br>
    <input type="text" name="reefer" value="<?php echo $this->proforma->reefer;?>"><br>

    <h1>costeo</h1>

    <input type="text" name="kilometros_e" value="<?php echo $this->proforma->kilometros_e;?>"><br>
    
    <input type="text" name="combustible_e" value="<?php echo $this->proforma->combustible_e;?>"><br>
    
    <input type="text" name="ETD_e" value="<?php echo $this->proforma->ETD_e;?>"><br>
    
    <input type="text" name="ETA_e" value="<?php echo $this->proforma->ETA_e;?>"><br>
   
    <input type="text" name="viaticos_e" value="<?php echo $this->proforma->viaticos_e;?>"><br>
   
    <input type="text" name="peajes_pesajes_e" value="<?php echo $this->proforma->peajes_pesajes_e;?>"><br>
    
    <input type="text" name="extras_e" value="<?php echo $this->proforma->extras_e;?>"><br>

    <input type="text" name="hazard_e" value="<?php echo $this->proforma->hazard_e;?>"><br>

    <input type="text" name="reefer_e" value="<?php echo $this->proforma->reefer_e;?>"><br>
 
    <input type="text" name="fee_e" value="<?php echo $this->proforma->fee_e;?>"><br>

    



<input type="submit" value="actualizar"><br><br>    
    <div><?php echo $this->mensaje;?></div>
</form>

<?php require 'views/footer.php';?>