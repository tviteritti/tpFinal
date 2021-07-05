<?php require 'views/header.php';?>
<?php require 'views/navChofer.php';?>

<div style="width:80%;margin:auto;" class="w3-center;">
    <div class="w3-card-4  w3-border w3-border-yellow w3-round-large w3-yellow" style="margin-top: 100px;margin-right: 20px;">
        <form class="w3-container" action="# " method="POST">
            <div class="w3-row-padding w3-responsive">
                <div class="w3-col l4 s12">
                    <h3><div><?php echo $this->mensaje;?></div></h3>
                    <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                         <h2>Proforma</h2>
                    </div>
                        
                    <label>Numero:</label>
                    <input class="w3-input" type="number" name="numero" value="<?php echo $this->proforma->numero;?>"><br>
                    <label>Fecha:</label>
                    <input class="w3-input" type="date" name="fecha" value="<?php echo $this->proforma->fecha;?>"><br>
                    <label>Id Viaje:</label>
                    <input class="w3-input" type="number" name="id_viaje" value="<?php echo $this->proforma->id_viaje;?>"><br>
                    <label>Id Carga:</label>
                    <input class="w3-input" type="number" name="id_carga" value="<?php echo $this->proforma->id_carga;?>"><br>
                    <label>Id Costeo Estimado:</label>
                    <input class="w3-input" type="number" name="id_costeo_estimado" value="<?php echo $this->proforma->id_costeo_estimado;?>"><br>
                    <label>Id Chofer</label>
                    <input class="w3-input" type="number" name="id_chofer" value="<?php echo $this->proforma->id_chofer;?>"><br>
                    <label>Id Vehiculo:</label>
                    <input class="w3-input" type="number" name="id_vehiculo" value="<?php echo $this->proforma->id_vehiculo;?>"><br>
                </div>
                <div class="w3-col l4 s12">
                    <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                        <h2>Viaje</h2>
                    </div>

                    <label>Origen:</label>
                    <input class="w3-input" type="text" name="origen" value="<?php echo $this->proforma->origen;?>"><br>
                    <label>Destino:</label>
                    <input class="w3-input" type="text" name="destino" value="<?php echo $this->proforma->destino;?>"><br>
                    <label>Fecha de Carga:</label>
                    <input class="w3-input" type="date" name="fecha_carga" value="<?php echo $this->proforma->fecha_carga;?>"><br>
                    <label>ETA:</label>
                    <input class="w3-input" type="date" name="ETA" value="<?php echo $this->proforma->ETA;?>"><br>
                </div>
                <div class="w3-col l4 s12">
                    <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                        <h2>Carga</h2>
                    </div>

                    <label>Peso Neto:</label>
                    <input class="w3-input" type="number" name="peso_neto" value="<?php echo $this->proforma->peso_neto;?>"><br>
                    <label>Tipo:</label>
                    <input class="w3-input" type="text" name="tipo" value="<?php echo $this->proforma->tipo;?>"><br>                             
                    <label>Reefer:</label>
                    <input class="w3-input" type="text" name="reefer" value="<?php echo $this->proforma->reefer;?>"><br> 
                    <label>Hazard:</label>
                    <input class="w3-input" type="text" name="hazard" value="<?php echo $this->proforma->hazard;?>"><br>
                </div>
            </div>

            <div class="w3-row-padding">
                <div class="w3-col l6 s12">
                    <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                        <h2>Costeo Estimado</h2>
                    </div>

                    <label>Kilemotros:</label>
                    <input class="w3-input" type="number" name="kilometros_e" value="<?php echo $this->proforma->kilometros_e;?>"><br>           
                    <label>combustible:</label>
                    <input class="w3-input" type="number" name="combustible_e" value="<?php echo $this->proforma->combustible_e;?>"><br>
                    <label>ETD:</label>
                    <input class="w3-input" type="date" name="ETD_e" value="<?php echo $this->proforma->ETD_e;?>"><br>
                    <label>ETA:</label>
                    <input class="w3-input" type="date" name="ETA_e" value="<?php echo $this->proforma->ETA_e;?>"><br>
                    <label>Viaticos:</label>
                    <input class="w3-input" type="number" name="viaticos_e" value="<?php echo $this->proforma->viaticos_e;?>"><br>
                    <label>Peajes Pasajes:</label>
                    <input class="w3-input" type="number" name="peajes_pesajes_e" value="<?php echo $this->proforma->peajes_pesajes_e;?>"><br>
                    <label>Extras:</label>
                    <input class="w3-input" type="number" name="extras_e" value="<?php echo $this->proforma->extras_e;?>"><br>
                    <label>Hazard:</label>
                    <input class="w3-input" type="number" name="hazard_e" value="<?php echo $this->proforma->hazard_e;?>"><br>
                    <label>Reefer:</label>
                    <input class="w3-input" type="number" name="reefer_e" value="<?php echo $this->proforma->reefer_e;?>"><br>
                    <label>Fee:</label>
                    <input class="w3-input" type="number" name="fee_e" value="<?php echo $this->proforma->fee_e;?>"><br>
                </div>
                <div class="w3-col l6 s12">
                    <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                        <h2>Costeo Real</h2>
                    </div>

                    <label>Kilemotros:</label>
                    <input class="w3-input" type="number" name="kilometros_e" value="<?php echo $this->proforma->kilometros_r;?>"><br>           
                    <label>combustible:</label>
                    <input class="w3-input" type="number" name="combustible_e" value="<?php echo $this->proforma->combustible_r;?>"><br>
                    <label>ETD:</label>
                    <input class="w3-input" type="date" name="ETD_e" value="<?php echo $this->proforma->ETD_r;?>"><br>
                    <label>ETA:</label>
                    <input class="w3-input" type="date" name="ETA_e" value="<?php echo $this->proforma->ETA_r;?>"><br>
                    <label>Viaticos:</label>
                    <input class="w3-input" type="number" name="viaticos_e" value="<?php echo $this->proforma->viaticos_r;?>"><br>
                    <label>Peajes Pasajes:</label>
                    <input class="w3-input" type="number" name="peajes_pesajes_e" value="<?php echo $this->proforma->peajes_pesajes_r;?>"><br>
                    <label>Extras:</label>
                    <input class="w3-input" type="number" name="extras_e" value="<?php echo $this->proforma->extras_r;?>"><br>
                    <label>Hazard:</label>
                    <input class="w3-input" type="number" name="hazard_e" value="<?php echo $this->proforma->hazard_r;?>"><br>
                    <label>Reefer:</label>
                    <input class="w3-input" type="number" name="reefer_e" value="<?php echo $this->proforma->reefer_r;?>"><br>
                    <label>Fee:</label>
                    <input class="w3-input" type="number" name="fee_e" value="<?php echo $this->proforma->fee_r;?>"><br>
                </div>
            </div>
        </form>


<?php require 'views/footer.php';?>