
<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>chofer</h1>
<a href="<?php echo constant('URL');?>chofer/cerrarSesion">cerrar session</a>


<h1>consulta</h1>

<table width="100%">
    <thead>
        <tr>
            <th>numero</th>
            <th>fecha</th>
            <th>id_viaje</th>
            <th>id_carga</th>
            <th>id_costeo_estimado</th>
            <th>id_chofer</th>
        </tr>
    </thead>
    <tbody>
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
            <td><a href="<?php echo constant('URL') . 'chofer/verProforma/' . $proforma->numero;?>">ver mas</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php require 'views/footer.php';?>