<?php require 'views/header.php';?>
<?php require 'views/navSupervisor.php';?>

<table style="margin-top: 100px;" width="100%" class="w3-centered w3-border">
    
        <tr class="w3-yellow">
            <th>Numero</th>
            <th>Fecha</th>
            <th>Id viaje</th>
            <th>Id carga</th>
            <th>Id costeo estimado</th>
            <th>Id chofer</th>
            <th>Id vehiculo</th>
            <th>Editar</th>
            <th>Eliminar</th>
            <th>Ver pdf</th>
        </tr>
   
        <?php 
        include_once 'models/proforma.php';
            foreach($this->proforma as $row) {
                $proforma = new Proforma();
                $proforma = $row;
            
        ?>
        <tr>
            <td><?php echo $proforma->numero; ?></td>
            <td><?php echo $proforma->fecha; ?></td>
            <td><?php echo $proforma->id_viaje; ?></td>
            <td><?php echo $proforma->id_carga; ?></td>
            <td><?php echo $proforma->id_costeo_estimado; ?></td>
            <td><?php echo $proforma->id_chofer; ?></td>
            <td><?php echo $proforma->id_vehiculo; ?></td>
            <td><a class="w3-btn w3-blue w3-round-xxlarge" href="<?php echo constant('URL') . 'supervisor/verProforma/' . $proforma->numero;?>">Editar</a></td>
            <td><a class="w3-btn w3-red w3-round-xxlarge" href="<?php echo constant('URL') . 'supervisor/eliminarProforma/' . $proforma->numero;?>">Eliminar</a></td>
            <td><a class="w3-btn w3-yellow w3-round-xxlarge" href="<?php echo constant('URL') . 'supervisor/verPdf/'. $proforma->numero;?>">Ver pdf</a></td>
        </tr>
        <?php } ?>
</table>

<a style="margin-top: 20px" class="w3-button w3-block w3-green w3-hover-teal" href="<?php echo constant('URL') . 'supervisor/agregarProforma';?>">Crear una nueva proforma</a>

<?php require 'views/footer.php';?>