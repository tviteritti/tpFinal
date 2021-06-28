<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>pagina2</h1>

<form action="<?php echo constant('URL');?>pagina2/pruebaModel" method="POST">
    <input type="text" name="dni" ><br>
    <input type="text" name="nombre" ><br>
    <input type="text" name="apellido" ><br>
    <input type="date" name="fecha_nac" ><br>
    <input type="text" name="usuario" ><br>
    <input type="text" name="password" ><br>
    <input type="text" name="email" ><br>
    <input type="text" name="rol" ><br>
    <input type="submit" value="registrar"><br><br>
    <div><?php echo $this->message;?></div>
</form>

<?php require 'views/footer.php';?>