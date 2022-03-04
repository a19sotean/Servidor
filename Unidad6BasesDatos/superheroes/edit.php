<form action="./index.php?id='<?php echo $_GET['id'] ?>'"/>
    <input type='text' value=<?php echo $_GET['nombre']?> name='nombreModificado' />
    <input type='hidden' name='id' value="<?php echo $_GET['id'] ?>" />
    <input type='submit' value='editar' />
</form>