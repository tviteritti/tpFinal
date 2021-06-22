
<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>index</h1>

<h1>iniciar Sesion</h1>

<form action="<?php echo constant('URL');?>main/inicioSesion" method="POST">
    <input type="text" name="user" require><br>
    <input type="text" name="password" require><br>
    <input type="submit" value="iniciar Sesion"><br><br>
    
</form>

<?php require 'views/footer.php';?>
