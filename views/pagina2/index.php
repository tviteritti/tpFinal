<?php require 'views/header.php';?>
<?php require 'views/nav.php';?>
    
<h1>pagina2</h1>

<form action="<?php echo constant('URL');?>pagina2/pruebaModel" method="POST">
    <input type="text" name="user" require><br>
    <input type="text" name="password" require><br>
    <input type="submit" value="registrar"><br><br>
    <div><?php echo $this->message;?></div>
</form>

<?php require 'views/footer.php';?>