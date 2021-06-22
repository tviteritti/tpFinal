<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>consulta</h1>

<table width="100%">
    <thead>
        <tr>
            <th>id</th>
            <th>dni</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>fecha_nac</th>
            <th>usuario</th>
            <th>password</th>
            <th>email</th>
            <th>rol</th>
        </tr>
    </thead>
    <tbody>
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
            <td><a href="<?php echo constant('URL') . 'consulta/verEmpleado/' . $empleado->id;?>">Editar</a></td>
            <td><a href="<?php echo constant('URL') . 'consulta/eliminarEmpleado/' . $empleado->id;?>">Eliminar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<?php require 'views/footer.php';?>