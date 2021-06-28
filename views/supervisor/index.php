<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>supervisor</h1>
<a href="<?php echo constant('URL');?>supervisor/cerrarSesion">cerrar session</a>

<form action="<?php echo constant('URL');?>supervisor/cargarProforma" method="POST">
    <input type="date" name="fecha" ><br>

    <h2>viaje</h2>
    <input type="text" name="origen" ><br>
    <input type="text" name="destino" ><br>
    <input type="date" name="fecha_carga" ><br>
    <input type="text" name="ETA" ><br>

    <h2>carga</h2>
    <input type="text" name="tipo" ><br>
    <input type="number" name="peso_neto" ><br>
    <input type="text" name="hazard" ><br>
    <input type="text" name="reefer" ><br>

    <h2>costeo</h2>
    <input type="number" name="kilometros_e" ><br>
    <input type="number" name="kilometros_r" ><br>
    <input type="number" name="combustible_e" ><br>
    <input type="number" name="combustible_r" ><br>
    <input type="number" name="ETD_e" ><br>
    <input type="number" name="ETD_r" ><br>
    <input type="number" name="ETA_e" ><br>
    <input type="number" name="ETA_r" ><br>
    <input type="number" name="viaticos_e" ><br>
    <input type="number" name="viaticos_r" ><br>
    <input type="number" name="peajes_pesajes_e" ><br>
    <input type="number" name="peajes_pesajes_r" ><br>
    <input type="number" name="extras_e" ><br>
    <input type="number" name="extras_r" ><br>
    <input type="number" name="hazard_e" ><br>
    <input type="number" name="hazard_r" ><br>
    <input type="number" name="reefer_e" ><br>
    <input type="number" name="reefer_r" ><br>
    <input type="number" name="fee_e" ><br>
    <input type="number" name="fee_r" ><br>
    

    <h2>chofer</h2>
    <select name="id_chofer">
    <?php 
        include_once 'models/empleado.php';
            foreach($this->empleados as $row) {
                $empleado = new Empleado();
                $empleado = $row;
            
    ?>
        <option value="<?php echo $empleado->id; ?>"><?php echo $empleado->nombre ." ". $empleado->apellido; ?></option>
    </select>
    <?php } ?>
    <br>


    <input type="submit" value="registrar"><br><br>
    <div><?php echo $this->message;?></div>
</form>

<h1>consulta</h1>

<table width="100%">
    <thead>
        <tr>
            <th>numero</th>
            <th>fecha</th>
            <th>id_viaje</th>
            <th>id_carga</th>
            <th>id_costeo</th>
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
            <td><?php echo $proforma->id_costeo; ?></td>
            <td><?php echo $proforma->id_chofer; ?></td>
            <td><a href="<?php echo constant('URL') . 'supervisor/verProforma/' . $proforma->numero;?>">Editar</a></td>
            <td><a href="<?php echo constant('URL') . 'supervisor/eliminarProforma/' . $proforma->numero;?>">Eliminar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php require 'views/footer.php';?>