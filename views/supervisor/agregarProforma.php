<?php require 'views/header.php';?>
<?php require 'views/navSupervisor.php';?>

<div style="width:80%;margin:auto;" class="w3-center;">
    <div class="w3-card-4  w3-border w3-border-yellow w3-round-large w3-yellow" style="margin-top: 100px;margin-right: 20px;">

                
        <form class="w3-container" style="margin-top:20px" action="<?php echo constant('URL');?>supervisor/cargarProforma" method="POST">

            <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h1>Cargar Proforma</h1>
            </div>

            <label>Fecha:</label>
            <input class="w3-input" type="date" name="fecha" require><br>

            <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h2>Viaje</h2>
            </div>

            <label>Origen:</label>
            <input class="w3-input" type="text" name="origen" require>
            <label>Destino:</label>
            <input class="w3-input" type="text" name="destino" require>
            <label>Fecha de Carga:</label>
            <input class="w3-input" type="date" name="fecha_carga" require>
            <label>ETA:</label>
            <input class="w3-input" type="date" name="ETA" require>
        

            <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h2>Carga</h2>
            </div>

           <label>Peso Neto:</label>
            <input class="w3-input" type="number" name="peso_neto" require><br>
            <label>Tipo:</label>
            <input class="w3-input" type="text" name="tipo" require><br>                             
            <label>Reefer:</label>
            <input class="w3-input" type="text" name="reefer" require><br> 
            <label>Hazard:</label>
            <input class="w3-input" type="text" name="hazard" require><br>

            <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h2>Costeo Estimado</h2>
            </div>

            <label>Kilemotros:</label>
            <input class="w3-input" type="number" name="kilometros_e" require><br>           
            <label>combustible:</label>
            <input class="w3-input" type="number" name="combustible_e" require><br>
            <label>ETD:</label>
            <input class="w3-input" type="date" name="ETD_e" require><br>
            <label>ETA:</label>
            <input class="w3-input" type="date" name="ETA_e" require><br>
            <label>Viaticos:</label>
            <input class="w3-input" type="number" name="viaticos_e" require><br>
            <label>Peajes Pasajes:</label>
            <input class="w3-input" type="number" name="peajes_pesajes_e" require><br>
            <label>Extras:</label>
            <input class="w3-input" type="number" name="extras_e" require><br>
            <label>Hazard:</label>
            <input class="w3-input" type="number" name="hazard_e" require><br>
            <label>Reefer:</label>
            <input class="w3-input" type="number" name="reefer_e" require><br>
            <label>Fee:</label>
            <input class="w3-input" type="number" name="fee_e" require><br>


            <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h2>Chofer</h2>
            </div>

            <div style="margin-top: 20px;">
                <label>Chofer:</label>
                <select class="w3-select" name="id_chofer">
                <?php 
                    include_once 'models/empleado.php';
                        foreach($this->empleados as $row) {
                            $empleado = new Empleado();
                            $empleado = $row;
                        
                ?>
                    <option value="<?php echo $empleado->id; ?>"><?php echo $empleado->nombre ." ". $empleado->apellido; ?></option>
                    <?php } ?>
                </select>
            </div>


            <div style="margin-top: 30px; margin-bottom: 10px;" class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
                <h2>Vehiculo</h2>
            </div>

            <div style="margin-top: 20px;">
                <label>Vehiculo:</label>
                <select class="w3-select" name="id_vehiculo">
                    <?php 
                        include_once 'models/vehiculo.php';
                            foreach($this->vehiculos as $row) {
                                $vehiculo = new Vehiculo();
                                $vehiculo = $row;
                            
                    ?>
                    <option value="<?php echo $vehiculo->id; ?>"><?php echo $vehiculo->marca ." ". $vehiculo->modelo; ?></option>
                    <?php } ?>
                </select>           

            </div>                

            <input style="margin-top: 90px" class="w3-button w3-block w3-green w3-hover-teal" type="submit" value="Cargar Proforma"><br><br>

        </form>
    </div>
</div>

<?php require 'views/footer.php';?>