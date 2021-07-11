<?php require 'views/header.php';?>
<?php require 'views/navEncargado.php';?>
    
<h1>consulta</h1>
<div class="w3-responsive">
    <table width="100%" class=" w3-centered w3-border">
        
            <tr class="w3-yellow">
                <th>Id</th>
                <th>marca</th>
                <th>modelo</th>
                <th>patente</th>
                <th>nro_chasis</th>
                <th>nro_motor</th>
                <th>anio_fabricacion</th>
                <th>service</th>
                <th>kilometraje</th>
                <th>max_combustible</th>
                <th>Realizar Service</th>
            </tr>
        
        
            <?php 
            include_once 'models/vehiculo.php';
                foreach($this->vehiculos as $row) {
                    $vehiculo = new Vehiculo();
                    $vehiculo = $row;
                
            ?>
            <tr>
                <td><?php echo $vehiculo->id; ?></td>
                <td><?php echo $vehiculo->marca; ?></td>
                <td><?php echo $vehiculo->modelo; ?></td>
                <td><?php echo $vehiculo->patente; ?></td>
                <td><?php echo $vehiculo->nro_chasis; ?></td>
                <td><?php echo $vehiculo->nro_motor; ?></td>
                <td><?php echo $vehiculo->anio_fabricacion; ?></td>
                <td><?php echo $vehiculo->service; ?></td>
                <td><?php echo $vehiculo->kilometraje; ?></td>
                <td><?php echo $vehiculo->max_combustible; ?></td>
                <td><a class="w3-btn w3-green w3-round-xxlarge" href="<?php echo constant('URL') . 'encargado/service/' . $vehiculo->id;?>">Realizar Service</a></td>
            </tr>
            <?php } ?>
        
    </table>
</div>

<?php require 'views/footer.php';?>