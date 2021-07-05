<?php require 'views/header.php';?>
<?php require 'views/navAdministrador.php';?>

<h1>consulta</h1>
<div class="w3-responsive">
<table width="100%" class=" w3-centered w3-border">
    
        <tr class="w3-yellow">
            <th>Id</th>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha_nac</th>
            <th>Usuario</th>
            <th>Password</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    
    
        <?php 
        include_once 'models/empleado.php';
            foreach($this->empleados as $row) {
                $empleado = new Empleado();
                $empleado = $row;
            
        ?>
        <tr>
            <td><?php echo $empleado->id; ?></td>
            <td><?php echo $empleado->dni; ?></td>
            <td><?php echo $empleado->nombre; ?></td>
            <td><?php echo $empleado->apellido; ?></td>
            <td><?php echo $empleado->fecha_nac; ?></td>
            <td><?php echo $empleado->usuario; ?></td>
            <td><?php echo $empleado->password; ?></td>
            <td><?php echo $empleado->email; ?></td>
            <td><?php echo $empleado->rol; ?></td>
            <td><a class="w3-btn w3-blue w3-round-xxlarge" href="<?php echo constant('URL') . 'administrador/verEmpleado/' . $empleado->id;?>">Editar</a></td>
            <td><a class="w3-btn w3-red w3-round-xxlarge" href="<?php echo constant('URL') . 'administrador/eliminarEmpleado/' . $empleado->id;?>">Eliminar</a></td>
        </tr>
        <?php } ?>
    
</table>
</div>

<?php require 'views/footer.php';?>