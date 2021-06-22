<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>detalle</h1>

<form action="<?php echo constant('URL');?>consulta/actualizarEmpleado" method="POST">
    <input type="text" name="id" value="<?php echo $this->empleado->id;?>"><br>
    <input type="text" name="dni" value="<?php echo $this->empleado->dni;?>"><br>
    <input type="text" name="nombre" value="<?php echo $this->empleado->nombre;?>"><br>
    <input type="text" name="apellido" value="<?php echo $this->empleado->apellido;?>"><br>
    <input type="text" name="fecha_nac" value="<?php echo $this->empleado->fecha_nac;?>"><br>
    <input type="text" name="usuario" value="<?php echo $this->empleado->usuario;?>"><br>
    <input type="text" name="password" value="<?php echo $this->empleado->password;?>"><br>
    <input type="text" name="email" value="<?php echo $this->empleado->email;?>"><br>
    <input type="text" name="rol" value="<?php echo $this->empleado->rol;?>"><br>
    <input type="submit" value="registrar"><br><br>
    <div><?php echo $this->mensaje;?></div>
</form>


<?php require 'views/footer.php';?>