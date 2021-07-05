<?php require 'views/header.php';?>
<?php require 'views/navAdministrador.php';?>
<div style="width:80%;margin:auto;" class="w3-center;">
    <div class="w3-card-4  w3-border w3-border-yellow w3-round-large w3-yellow" style="margin-top: 100px;margin-right: 20px;">
        
        <div class="w3-container w3-orange  w3-border w3-border-orange w3-round-large" >
        <h2>Modificar Empleado</h2>
        </div>
  
        
        <form class="w3-container" style="margin-top:20px" action="<?php echo constant('URL');?>administrador/actualizarEmpleado" method="POST">
            <label>Id</label>   
            <input class="w3-input" type="text" name="id" value="<?php echo $this->empleado->id;?>"><br>
            <label>Dni</label>
            <input class="w3-input" type="text" name="dni" value="<?php echo $this->empleado->dni;?>"><br>
            <label>Nombre</label>
            <input class="w3-input" type="text" name="nombre" value="<?php echo $this->empleado->nombre;?>"><br>
            <label>Apellido</label>
            <input class="w3-input" type="text" name="apellido" value="<?php echo $this->empleado->apellido;?>"><br>
            <label>Fecha de nacimiento</label>
            <input class="w3-input" type="text" name="fecha_nac" value="<?php echo $this->empleado->fecha_nac;?>"><br>
            <label>User</label>
            <input class="w3-input" type="text" name="usuario" value="<?php echo $this->empleado->usuario;?>"><br>
            <label>Password</label>
            <input class="w3-input" type="text" name="password" value="<?php echo $this->empleado->password;?>"><br>
            <label>Email</label>
            <input class="w3-input" type="text" name="email" value="<?php echo $this->empleado->email;?>"><br>
            <label for="rol" class="w3-left">Rol</label>
            <select class="w3-select" name="rol" required>
                <option value="<?php echo $this->empleado->rol;?>" disabled selected><?php echo $this->empleado->rol;?></option>
                <option value="chofer">Chofer</option>
                <option value="supervisor">Supervisor</option>
                <option value="encargado">Encargado del taller</option>
            </select>

            <input style="margin-top:40px" class="w3-button w3-block w3-green w3-hover-teal" type="submit" value="actualizar"><br><br>
            <div><?php echo $this->mensaje;?></div>
        </form>

    </div>
</div>

<?php require 'views/footer.php';?>