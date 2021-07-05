 <?php require 'views/header.php';?>
<?php require 'views/navChofer.php';?>

<div class="w3-center"><h1><?php echo $this->mensaje;?></h1></div>
<table style="margin-top: 100px;" width="100%" class="w3-centered w3-border">
    
        <tr class="w3-yellow">
            <th>Numero</th>
            <th>Fecha</th>
            <th>Id Viaje</th>
            <th>Id Carga</th>
            <th>Id Costeo Estimado</th>
            <th>Id Chofer</th>
            <th>Ver mas</th>
            <th>Comenzar Viaje</th>
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
            <td><a class="w3-btn w3-blue w3-round-xxlarge" href="<?php echo constant('URL') . 'chofer/verProforma/' . $proforma->numero;?>">ver mas</a></td>
            
            <?php if($proforma->estado == "antes"){?><td><a class="w3-btn w3-green w3-round-xxlarge" href="<?php echo constant('URL') . 'chofer/comenzarViaje/' . $proforma->numero;echo'">comenzar viaje</a></td>';}?>
            
        </tr>
        <?php } ?>
    
</table>


<?php require 'views/footer.php';?>